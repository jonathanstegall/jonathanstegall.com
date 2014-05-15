# Jekyll blog config/deploy.rb file
require 'mina/bundler'
require 'mina/rails'
require 'mina/git'
#require 'mina/rvm'    # for rvm support. (http://rvm.io)

set :domain, 'jonathanstegall.com'
set :deploy_to, '/home/jonathanstegall/jonathanstegall.com/jekyll'
set :repository, 'git@bitbucket.org:jonathanstegall/jonathanstegall.com.git'
set :branch, 'master'

# Optional settings:
set :user, 'jonathanstegall'    # Username in the server to SSH to.

set :ssh_options, '-A'

# This task is the environment that is loaded for most commands, such as
# `mina deploy` or `mina rake`.
#task :environment do
#  invoke :'rvm:use[ruby-2.0.0-p247@nayr]'
#end

desc "Deploys the current version to the server."
task :deploy => :environment do
  deploy do
    # Put things that will set up an empty directory into a fully set-up
    # instance of your project.
    invoke :'git:clone'
    invoke :'bundle:install'
    queue "#{bundle_prefix} jekyll build"
  end
end