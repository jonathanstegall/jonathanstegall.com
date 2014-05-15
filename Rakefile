require 'fileutils'

namespace :draft do
  desc "Creating a new draft for post/entry"
  task :new do
    puts "What's the name for your next post?"
    @name = STDIN.gets.chomp
    @slug = "#{@name}"
    @slug = @slug.tr('ÁáÉéÍíÓóÚú', 'AaEeIiOoUu')
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
    @slug = @slug.tr('ÁáÉéÍíÓóÚú', 'AaEeIiOoUu')
    @slug = @slug.downcase.strip.gsub(' ', '-')
    @post_date = Time.now.strftime("%F")
    FileUtils.touch("_posts/#{@post_date}-#{@slug}.markdown")
    puts "Post url?"
    @url = STDIN.gets.chomp
    open("_posts/#{@post_date}-#{@slug}.markdown", 'a' ) do |file|
      file.puts "---"
      file.puts "layout: post"
      file.puts "status: publish"
      file.puts "title: #{@name}"
      file.puts "link: #{@url}"
      file.puts "type: aside"
      file.puts "categories:"
      file.puts "- "
      file.puts "---"
    end
  end
end