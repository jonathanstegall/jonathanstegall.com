require 'fileutils'

namespace :draft do
  desc "Creating a new draft for post/entry"
  task :new do
    puts "What's the name for your next post?"
    @name = STDIN.gets.chomp
    @slug = "#{@name}"
    #@slug = @slug.tr('ÁáÉéÍíÓóÚú', 'AaEeIiOoUu')
    @slug = @slug.downcase.strip.gsub(' ', '-')
    FileUtils.touch("_drafts/#{@slug}.markdown")
    open("_drafts/#{@slug}.markdown", 'a' ) do |file|
      file.puts "---"
      file.puts "layout: post"
      file.puts "title: #{@name}"
      file.puts "excerpt: "
      file.puts "type: post"
      file.puts "categories:"
      file.puts "- "
      file.puts "---"
    end
  end

  desc "copy draft to production post!"
  task :ready do
    puts "Posts in _drafts:"
    Dir.foreach("_drafts") do |fname|
      next if fname == '.' or fname == '..' or fname == '.keep'
      puts fname
    end
    puts "what's the name of the draft to post?"
    @post_name = STDIN.gets.chomp
    @post_date = Time.now.strftime("%F")
    FileUtils.mv("_drafts/#{@post_name}", "_posts/#{@post_name}")
    FileUtils.mv("_posts/#{@post_name}", "_posts/#{@post_date}-#{@post_name}")
    puts "Post copied and ready to deploy!"
  end
end

namespace :aside do
  desc "Creating a new aside for post/entry"
  task :new do
    puts "Post title?"
    @name = STDIN.gets.chomp
    @slug = "#{@name}"
    #@slug = @slug.tr('ÁáÉéÍíÓóÚú', 'AaEeIiOoUu')
    @slug = @slug.downcase.strip.gsub(' ', '-')
    @post_date = Time.now.strftime("%F")
    FileUtils.touch("_posts/#{@post_date}-#{@slug}.markdown")
    puts "Post url?"
    @url = STDIN.gets.chomp
    puts "Post body?"
    @body = STDIN.gets.chomp
    open("_posts/#{@post_date}-#{@slug}.markdown", 'a' ) do |file|
      file.puts "---"
      file.puts "layout: post"
      file.puts "status: publish"
      file.puts "title: \"#{@name}\""
      file.puts "link: #{@url}"
      file.puts "type: aside"
      file.puts "categories:"
      file.puts "- "
      file.puts "---"
      file.puts "#{@body}"
    end
  end
  desc "copy draft to production aside"
  task :ready do
    puts "Posts in _drafts/feedly:"
    Dir.foreach("_drafts/feedly") do |fname|
      next if fname == '.' or fname == '..' or fname == '.keep'
      puts fname
    end
    puts "what's the name of the draft aside to post?"
    @post_name = STDIN.gets.chomp
    @new_post_name = @post_name.downcase.strip.gsub('.txt', '.markdown')
    @post_date = Time.now.strftime("%F")
    FileUtils.mv("_drafts/feedly/#{@post_name}", "_posts/#{@new_post_name}")
    FileUtils.mv("_posts/#{@new_post_name}", "_posts/#{@post_date}-#{@new_post_name}")
    puts "Post copied and ready to deploy!"
  end
end

task :default => :preview

# CONFIGURATION VARIABLES
#
# MANAGING DEPLOYMENT.
# These variables specify where to deploy your website:
#
# $deploy_url = "http://www.example.com/somedir"    # where the system will live
# $deploy_dir = "user@host:~/some-location/"        # where the sources live
#
# PREVIEWING
# If your project is based on compass and you want compass to be invoked
# by the script, set the $compass variable to true
#
# $compass = false
#
# MANAGING POSTS
#
# Extension for new posts (defaults to .textile, if not set)
#
# $post_ext = ".textile"  # default
# $post_ext = ".md"       # if you prefer markdown
#
# Location of new posts (defaults to "_posts/", if not set).
# Please, terminate with a slash:
#
# $post_dir = "_posts/"
#
# ... or load them from a file, e.g.:
#
load '_rake-configuration.rb'

#
# --- NO NEED TO TOUCH ANYTHING BELOW THIS LINE ---
#

# Specify default values for variables NOT set by the user

$post_ext ||= ".textile"
$post_dir ||= "_posts/"

#
# Tasks start here
#

desc 'Clean up generated site'
task :clean do
  cleanup
end


desc 'Preview on local machine (server with --auto)'
task :preview => :clean do
  set_url('http://localhost:4000')
  compass('compile') # so that we are sure sass has been compiled before we run the server
  compass('watch &')
  jekyll('serve --watch')
end
task :serve => :preview


desc 'Static build (build using filesystem)'
task :build_static => :clean do
  set_url(Dir.getwd + "/_site")
  compass('compile')
  jekyll('build')
end


desc 'Build for deployment (but do not deploy)'
task :build => :clean do
  if rake_running then
    puts "\n\nWarning! An instance of rake seems to be running (it might not be *this* Rakefile, however).\n"
    puts "Building while running other tasks (e.g., preview), might create a website with broken links.\n\n"
    puts "Are you sure you want to continue? [Y|n]"

    ans = STDIN.gets.chomp
    break if ans != 'Y' 
  end

  set_url($deploy_url)
  compass('compile')
  jekyll('build')
end


desc 'Build and deploy to remote server'
task :deploy => :build do
  sh "rsync -avz --delete _site/ #{$deploy_dir}"
  File.open("_last_deploy.txt", 'w') {|f| f.write(Time.new) }
end


desc 'Create a post'
task :create_post, [:date, :title, :category, :content] do |t, args|
  if args.title == nil then
    puts "Error! title is empty"
    puts "Usage: create_post[date,title,category,content]"
    puts "DATE and CATEGORY are optional"
    puts "DATE is in the form: YYYY-MM-DD; use nil or empty for today's date"
    exit 1
  end
  if (args.date != nil and args.date != "" and args.date != "nil" and args.date.match(/[0-9]+-[0-9]+-[0-9]+/) == nil) then
    puts "Error: date not understood"
    puts "Usage: create_post[date,title,category,content]"
    puts "DATE and CATEGORY are optional"
    puts "DATE is in the form: YYYY-MM-DD; use nil or the empty string for today's date"
    puts ""
    puts "Examples: create_post[\"\",\"title\"]"
    puts "          create_post[nil,\"title\"]"
    puts "          create_post[,\"title\"]"
    puts "          create_post[#{Time.new.strftime("%Y-%m-%d")},\"title\"]"
    exit 1
  end

  post_title= args.title
  post_date= (args.date != "" and args.date != "nil") ? args.date : Time.new.strftime("%Y-%m-%d %H:%M:%S %Z")

  # the destination directory is <<category>>/$post_dir, if category is non-nil
  # and the directory exists; $post_dir otherwise (a category tag is added in
  # the post body, in this case)
  category = args.category
  if category and Dir.exists?(File.join(category, "_posts")) then
    post_dir = File.join(category, "_posts")
    yaml_cat = nil
  else
    post_dir = $post_dir
    yaml_cat = "category: #{category}\n"
  end

  def slugify (title)
    # strip characters and whitespace to create valid filenames, also lowercase
    return title.downcase.strip.gsub(' ', '-').gsub(/[^\w-]/, '')
  end

  filename = post_date[0..9] +"-"+ slugify( post_title ) + $post_ext

  # generate a unique filename appending a number
  i = 1
  while File.exists?(post_dir + filename) do
    filename = post_date[0..9] + "-" + 
               post_title.gsub(' ', '_') + "-" + i.to_s + 
               ".textile"
    i += 1
  end

  # the condition is not really necessary anymore (since the previous
  # loop ensures the file does not exist)
  if not File.exists?(post_dir + filename) then
      File.open(post_dir + filename, 'w') do |f|
        f.puts "---"
        f.puts "title: \"#{post_title}\""
        f.puts "layout: default"
        f.puts yaml_cat if yaml_cat != nil
        f.puts "date: #{post_date}"
        f.puts "---"
        f.puts args.content if args.content != nil
      end  

      puts "Post created under \"#{post_dir}#{filename}\""

      sh "open \"#{post_dir}#{filename}\"" if args.content == nil
  else
    puts "A post with the same name already exists. Aborted."
  end
  # puts "You might want to: edit #{$post_dir}#{filename}"
end


desc 'Create a post listing all changes since last deploy'
task :post_changes do |t, args|
  content = list_file_changed
  Rake::Task["create_post"].invoke(Time.new.strftime("%Y-%m-%d %H:%M:%S"), "Recent Changes", nil, content)
end


desc 'Show the file changed since last deploy to stdout'
task :list_changes do |t, args|
  content = list_file_changed
  puts content
end


#
# support functions for generating list of changed files
#

def list_file_changed
  content = "Files changed since last deploy:\n"
  IO.popen('find * -newer _last_deploy.txt -type f') do |io| 
    while (line = io.gets) do
      filename = line.chomp
      if user_visible(filename) then
        content << "* \"#{filename}\":{{site.url}}/#{file_change_ext(filename, ".html")}\n"
      end
    end
  end 
  content
end

# this is the list of files we do not want to show in changed files
EXCLUSION_LIST = [/.*~/, /_.*/, "javascripts?", "js", /stylesheets?/, "css", "Rakefile", "Gemfile", /s[ca]ss/, /.*\.css/, /.*.js/, "bower_components", "config.rb"]

# return true if filename is "visible" to the user (e.g., it is not javascript, css, ...)
def user_visible(filename)
  exclusion_list = Regexp.union(EXCLUSION_LIST)
  not filename.match(exclusion_list)
end 

def file_change_ext(filename, newext)
  if File.extname(filename) == ".textile" or File.extname(filename) == ".md" then
    filename.sub(File.extname(filename), newext)
  else  
    filename
  end
end


desc 'Check links for site already running on localhost:4000'
task :check_links do
  begin
    require 'anemone'

    root = 'http://localhost:4000/'
    puts "Checking links with anemone ... "
    # check-links --no-warnings http://localhost:4000
    Anemone.crawl(root, :discard_page_bodies => true) do |anemone|
      anemone.after_crawl do |pagestore|
        broken_links = Hash.new { |h, k| h[k] = [] }
        pagestore.each_value do |page|
          if page.code != 200
            referrers = pagestore.pages_linking_to(page.url)
            referrers.each do |referrer|
              broken_links[referrer] << page
            end
          else
            puts "OK #{page.url}"
          end
        end
        puts "\n\nLinks with issues: "
        broken_links.each do |referrer, pages|
          puts "#{referrer.url} contains the following broken links:"
          pages.each do |page|
            puts "  HTTP #{page.code} #{page.url}"
          end
        end
      end
    end
    puts "... done!"

  rescue LoadError
    abort 'Install anemone gem: gem install anemone'
  end
end


#
# General support functions
#

# remove generated site
def cleanup
  sh 'rm -rf _site'
  compass('clean')
end

# launch jekyll
def jekyll(directives = '')
  sh 'jekyll ' + directives
end

# launch compass
def compass(command = 'compile')
  (sh 'compass ' + command) if $compass
end

# check if there is another rake task running (in addition to this one!)
def rake_running
  `ps | grep 'rake' | grep -v 'grep' | wc -l`.to_i > 1
end

# set the url variable in _config.yml (for deployment)
# set also the display_path variable if present (used by japr)
def set_url(url)
  if $deploy_url != nil
    config_filename = "_config.yml"
    text = File.read(config_filename)
    url_directive = Regexp.new(/^url: .*$/)
    if text.match(url_directive)
      text = text.gsub(url_directive, "url: #{url}")
    else
      text = text + "\nurl: #{url}"
    end

    # for japr (Jekyll asset bundler)
    display_path_directive = Regexp.new(/^[ ]+display_path: .*$/)
    if text.match(display_path_directive)
      # if the deploy url has a subdirectory, set display_path to the subdir + assets
      path = url.match(/http:\/\/[^\/]+\//) ? File.join(url.gsub(/http:\/\/[^\/]+\//, ""), "assets") : nil
      text = text.gsub(display_path_directive, "  display_path: #{path}")
    end

    File.open(config_filename, "w") { |file| file << text }
  end
end 

