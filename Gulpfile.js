// Require our dependencies
const autoprefixer = require('autoprefixer');
const babel = require('gulp-babel');
const browserSync = require('browser-sync').create();
const concat = require('gulp-concat');
const cssnano = require('cssnano');
const fs = require('fs');
const gulp = require('gulp');
const imagemin = require('gulp-imagemin');
const packagejson = JSON.parse(fs.readFileSync('./package.json'));
const mqpacker = require( 'css-mqpacker' );
const plumber = require('gulp-plumber');
const postcss = require('gulp-postcss');
const rename = require('gulp-rename');
const sass = require('gulp-sass');
const sassGlob = require('gulp-sass-glob');
const sort = require( 'gulp-sort' );
const sourcemaps = require('gulp-sourcemaps');
const svgmin = require( 'gulp-svgmin' );
const uglify = require('gulp-uglify');
const wpPot = require('gulp-wp-pot');

// Some config data for our tasks
const config = {
  styles: {
    front_end: 'assets/sass/*.scss',
    srcDir: 'assets/sass',
    front_end_dest: 'assets/css',
  },
  scripts: {
    main: './assets/js/src/**/*.js',
    uglify: [ 'assets/js/*.js', '!assets/js/*.min.js', '!assets/js/customizer.js' ],
    dest: './assets/js'
  },
  images: {
  	main: './assets/img/**/*',
  	dest: './assets/img/'
  },
  languages: {
    src: [ './**/*.php', '!vendor/*' ],
    dest: './languages/' + packagejson.name + '.pot'
  },
  browserSync: {
    active: false,
    localURL: 'mylocalsite.local'
  }
};

function adminstyles() {
  return gulp.src(config.styles.admin)
    .pipe(sourcemaps.init()) // Sourcemaps need to init before compilation
    .pipe(sassGlob()) // Allow for globbed @import statements in SCSS
    .pipe(sass()) // Compile
    .on('error', sass.logError) // Error reporting
    .pipe(postcss([
      mqpacker( {
        'sort': true
      } ),
      cssnano( {
        'safe': true // Use safe optimizations.
		} ) // Minify
    ]))
    .pipe(sourcemaps.write()) // Write the sourcemap files
    .pipe(gulp.dest(config.styles.dest)) // Drop the resulting CSS file in the specified dir
    .pipe(browserSync.stream());
}

function frontendstyles() {
  return gulp.src(config.styles.front_end)
    .pipe(sourcemaps.init()) // Sourcemaps need to init before compilation
    .pipe(sassGlob()) // Allow for globbed @import statements in SCSS
    .on('error', sass.logError) // Error reporting
    .pipe(postcss([
      mqpacker( {
        'sort': true
      } ),
      cssnano( {
        'safe': true // Use safe optimizations.
		} ) // Minify
    ]))
    .pipe(sourcemaps.write()) // Write the sourcemap files
    .pipe(gulp.dest(config.styles.front_end_dest)) // Drop the resulting CSS file in the specified dir
    .pipe(browserSync.stream());
}

function adminscripts() {
  return gulp.src(config.scripts.admin)
    .pipe(sourcemaps.init())
    .pipe(babel({
      presets: ['@babel/preset-env']
    }))
    .pipe(concat('admin.js')) // Concatenate
    .pipe(uglify()) // Minify + compress
    .pipe(rename({
      suffix: '.min'
    }))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest(config.scripts.dest))
    .pipe(browserSync.stream());
}

function mainscripts() {
  return gulp.src(config.scripts.main)
    .pipe(sourcemaps.init())
    .pipe(babel({
      presets: ['@babel/preset-env']
    }))
    .pipe(concat(packagejson.name + '.js')) // Concatenate
    /*.pipe(uglify()) // Minify + compress
    .pipe(rename({
      suffix: '.min'
    }))*/
    .pipe(sourcemaps.write())
    .pipe(gulp.dest(config.scripts.dest))
    .pipe(browserSync.stream());
}

function uglifyscripts() {
  return gulp.src(config.scripts.uglify)
    .pipe(uglify()) // Minify + compress
    .pipe(rename({
      suffix: '.min'
    }))
    //.pipe(sourcemaps.write())
    .pipe(gulp.dest(config.scripts.dest))
    .pipe(browserSync.stream());
}

// Optimize Images
function images() {
  return gulp
    .src(config.images.main)
    .pipe(
      imagemin([
        imagemin.gifsicle({ interlaced: true }),
        imagemin.jpegtran({ progressive: true }),
        imagemin.optipng({ optimizationLevel: 5 }),
        imagemin.svgo({
          plugins: [
            {
              removeViewBox: false,
              collapseGroups: true
            }
          ]
        })
      ])
    )
    .pipe(gulp.dest(config.images.dest));
}

function svgminify() {
	return gulp.src( config.images.main + '.svg' )
        .pipe(svgmin())
        .pipe(gulp.dest(config.images.dest));
}

// Generates translation file.
function translate() {
    return gulp
      .src( config.languages.src )
      .pipe( wpPot( {
        domain: packagejson.name,
        package: packagejson.name
      } ) )
      .pipe( gulp.dest( config.languages.dest ) );
}

// Injects changes into browser
function browserSyncTask() {
  if (config.browserSync.active) {
    browserSync.init({
      proxy: config.browserSync.localURL
    });
  }
}

// Reloads browsers that are using browsersync
function browserSyncReload(done) {
  browserSync.reload();
  done();
}

// Watch directories, and run specific tasks on file changes
function watch() {
  gulp.watch(config.styles.srcDir, styles);
  gulp.watch(config.scripts.admin, adminscripts);
  
  // Reload browsersync when PHP files change, if active
  if (config.browserSync.active) {
    gulp.watch('./**/*.php', browserSyncReload);
  }
}

// export tasks
exports.adminstyles    = adminstyles;
exports.frontendstyles = frontendstyles;
exports.adminscripts   = adminscripts;
exports.mainscripts    = mainscripts;
exports.uglifyscripts  = uglifyscripts;
exports.images         = images;
exports.svgminify      = svgminify;
exports.translate      = translate;
exports.watch          = watch;

// What happens when we run gulp?
gulp.task('default',
  gulp.series(
    gulp.parallel(frontendstyles, mainscripts, uglifyscripts, images, translate) // run these tasks asynchronously
  )
);

gulp.task('styles',
  gulp.series(
    gulp.parallel(frontendstyles) // run these tasks asynchronously
  )
);

gulp.task('scripts',
  gulp.series(mainscripts, uglifyscripts) // run these tasks in a series
);