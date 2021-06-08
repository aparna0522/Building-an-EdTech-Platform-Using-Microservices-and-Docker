class ApplicationController < ActionController::Base
    validates :todo_items, presence: true
end
