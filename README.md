# Test task for Job Interview for Middle PHP Developer position in Russian Company
 ## #VueJS #PHP #Laravel #API
  ### #Animals #AnimalKinds
  
  - call backend to get AnimalKinds 
  - choose animal to grow
  
  ### Installation

  - git clone https://github.com/Laradock/laradock.git 
  - cd laradock
  - copy env-example .env
  - Edit .env file: 
     * DB_HOST=mysql
     * DB_DATABASE=default
     * DB_USERNAME=default
     * DB_PASSWORD=secret
  - docker-compose up -d nginx mysql phpmyadmin redis workspace 
  - docker-compose exec workspace bash
  - composer install
  - php artisan key:generate
  - artisan db:seed --class=AnimalKindSeeder
  - npm install
  - npm run dev
