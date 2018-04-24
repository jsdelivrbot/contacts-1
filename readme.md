## Installation

Clone the project to some location eg /var/www

- Change directories to the root folder
- Install composer dependents
    - composer install
- Install npm dependents
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
- Run database seed to load dabase with dummy data
    - php artisan db:seed
- Rebuild node modules
    - sudo npm rebuild node-sass
- Run unit tests
    -vendor/bin/phpunit
