## About the application

- This is a CRUD application built using Composer and Vue.Js
- The application is a Restful application that can be extended to build any kind of application
- Just did some minimum tests to show how to implement some TDD

## Installation

Clone the project to some location eg /var/www

Packages needed 
- PHP 7.0.28
- Composer
- npm v 3.10.10
- MysQl

- Change directories to the root folder
- Install composer dependents
    - composer install
- Install npm dependencies
    - sudo npm install
- Copy the .env.example file to .env
- Generate app key
     - php artisan key:generate
- Create a database and update the .env file to point to created database by chaning the following
    - DB_DATABASE=
    - DB_USERNAME=
    - DB_PASSWORD=
- Run database migration to update the database
    - php artisan migrate
- Run database seed to load database with dummy data
    - php artisan db:seed
- Rebuild node modules
    - sudo npm run production
    - sudo npm rebuild node-sass
- Run unit tests
    - vendor/bin/phpunit
- To run the test for testing
    -Run php artisan serve and go to 127.0.0.1:8000
