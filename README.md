 ## #VueJS #PHP #Laravel #API
  ### #Animals #AnimalKinds
  
  - call backend to get AnimalKinds 
  - choose animal to grow
  
  ### Installation

  - git clone https://github.com/Laradock/laradock.git 
  - copy env-example .env
  - Edit .env file: 
     * DB_HOST=mysql
     * DB_DATABASE=default
     * DB_USERNAME=default
     * DB_PASSWORD=secret
  - cd laradock
  - docker-compose up -d nginx mysql
  - docker-compose exec workspace bash
  - composer install
  - php artisan key:generate
  - artisan db:seed --class=AnimalKindSeeder
  - npm install
  - npm run dev
