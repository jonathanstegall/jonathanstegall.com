<?php
/**
 * jonathanstegall_2015 functions and definitions
 *
 * @package jonathanstegall_2015
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'jonathanstegall_2015_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function jonathanstegall_2015_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on jonathanstegall_2015, use a find and replace
	 * to change 'jonathanstegall_2015' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'jonathanstegall_2015', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'jonathanstegall_2015' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'jonathanstegall_2015_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // jonathanstegall_2015_setup
add_action( 'after_setup_theme', 'jonathanstegall_2015_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function jonathanstegall_2015_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'jonathanstegall_2015' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'jonathanstegall_2015_widgets_init' );

function post_classes( $classes ) {
	array_push($classes, 'post-type-page', 'grid', 'cf');
	return $classes;
}
add_filter( 'post_class', 'post_classes' );

/**
 * Enqueue scripts and styles.
 */
function jonathanstegall_2015_scripts() {
	global $wp_query;
	wp_enqueue_style( '_s-style', get_stylesheet_uri() );
	if ( WP_DEBUG || SCRIPT_DEBUG ) {
		wp_enqueue_script( '_s-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
		wp_enqueue_script( '_s-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
		wp_enqueue_script( '_s-ajax-paginate', get_template_directory_uri() . '/js/ajax-paginate.js', array(), '20150728', true );

		wp_localize_script( '_s-ajax-paginate', 'ajaxpagination', array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
			'query_vars' => json_encode( $wp_query->query )
		));

	} else {
		wp_enqueue_script( '_s-combined', get_template_directory_uri() . '/js/combined.min.js', array(), '20130115', true );
		wp_localize_script( '_s-combined', 'ajaxpagination', array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
			'query_vars' => json_encode( $wp_query->query )
		));
	}
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'jonathanstegall_2015_scripts' );

add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
add_filter('page_css_class', 'my_css_attributes_filter', 100, 1);
function my_css_attributes_filter($var) {
	$intersect = array('current-menu-item');
	if (is_array($var)) {
		foreach ($var as $key => $value) {
			if ( $key == 0 ) {
				//echo 'my thing is ' . $value;
				$intersect[] = $value;
			}
		}
	}
  return is_array($var) ? array_intersect($var, $intersect) : '';
}

function get_id_by_slug($page_slug) {
    $page = get_page_by_path($page_slug);
    if ($page) {
        return $page->ID;
    } else {
        return null;
    }
}


add_action( 'wp_ajax_nopriv_ajax_pagination', 'my_ajax_pagination' );
add_action( 'wp_ajax_ajax_pagination', 'my_ajax_pagination' );

function my_ajax_pagination() {
    $query_vars = json_decode( stripslashes( $_POST['query_vars'] ), true );
    $year = stripslashes($_POST['year']);

    /** supply from cache **/
    $page_from_cache = get_option( "ajax_paginate{$year}", 0 );
    if($page_from_cache){
        die($page_from_cache);
    }
    /** cache end **/

    $post_args = array(
		'posts_per_page'   => -1,
		'orderby'          => 'post_date',
		'order'            => 'DESC',
		'post_type'        => 'post',
		'post_status'	   => 'publish',
		'tax_query' => array(
	        array(
			'taxonomy' => 'post_format',
			'field' => 'slug',
			'terms' => array('post-format-aside','post-format-image','post-format-video','post-format-quote','post-format-link'),
			'operator' => 'NOT IN'
			)
	    ),
		'year' => $year, // fix post format stuff
	);

	$posts = new WP_Query();  // Main blog query
	$posts->query( $post_args );

	ob_start();
    ?>
    <div class="grid-wrapper cf">
		    <section class="year grid cf">
		    	<h1><?php echo $year; ?></h1>
			    <?php if ( $posts->have_posts() ) : while ( $posts->have_posts() ) : $posts->the_post(); ?>
					<article>
					<?php
					$post_meta = get_post_custom(get_the_ID());
					set_query_var( 'post_meta', $post_meta );
					get_template_part( 'content-title', get_post_format() );
					?>
					</article>
				<?php endwhile; endif; ?>
				<?php
				$archiveyears = wp_get_archives( array('type' => 'yearly', 'echo' => false) );
				$archiveyears = explode( '</li>' , $archiveyears );
				$postyears = array();
				foreach( $archiveyears as $postyear ) {
					$postyear = trim(strip_tags($postyear));
					if ( '' != $postyear && $year > $postyear ) {
						$postyears[] = $postyear;
					} else {
						continue;
					}
				}
				echo '<a href="/' . $postyears[0] . '" class="btn btn--positive next-year">Load <span>' . $postyears[0] . '</span> Posts</a>';
				?>
			</section>
		</div>

	<?php

    $new_cache = ob_get_flush();
 
    /** save the cache **/
    update_option( "ajax_paginate{$year}",$new_cache);
    /** end cache **/
    die($new_cache);
}

add_filter( 'jetpack_open_graph_tags', function( $og_tags ) {
        $og_tags['twitter:site'] = '@jonathanstegall';
        unset( $og_tags['og:image'] );
        return $og_tags;
}, 11 );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
