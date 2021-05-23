# My First Ruby on Rails Application: Todo-Organizer
* Ruby version: ruby 2.6.3p62 
* Rails version: Rails 6.1.3

<h2>How to run this project?</h2>
1. Check if you have rbenv, node, yarn, bundler, ruby, rails installed on your local machine using the following commands 

```
rbenv --version 
node --version
yarn --version
bundler --version
ruby --version
rails --version
```

2. Install rbenv, node, yarn, bundler, ruby, rails on your local machine. 

```
brew install rbenv
brew install node
brew install npm
brew install yarn
brew install rails
brew install bundler
brew install ruby
```

3. Install the webpacker using the following command.

```
bundle exec rake webpacker:install
```

4. Now use the following commands to set up the database

```
bundle e rails db:setup
bundle e rails db:migrate
```

5. Now run the project using the following command 

```
rails s
OR 
bundle execute rails s
```

<h4>Some possible refinements:</h4>

1. Adding the dates and bifurcating the todos as per that. 
2. Avoid creation of blank todos. 
3. Possibility of deleting an entire todo list (which has todo items in it) directly, without having to delete them one by one. 

<b>Project Inspired From:</b> https://www.youtube.com/watch?v=fd1Vn-Wvy2w by Mackenzie Child
