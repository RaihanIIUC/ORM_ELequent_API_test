
# To Run It in your Computer 
* Clone the Respiraratory

*  Extract the file 
* Run Those Command

   * ```Composer install```
   * ``` php artisan serve --port=8006```
   *   create a database in database named ```demo```
   * ```cp .env.example .env```
   * replace this in .env file with same text
   ```
      DB_CONNECTION=mysql
      DB_HOST=127.0.0.1
      DB_PORT=3306
      DB_DATABASE=demo
      DB_USERNAME=root
      DB_PASSWORD= ```


* Run 
   * ```composer require doctrine/dbal ```
   *  ``` php artisan migrate ```
   * ``` php artisan db:seed ```


## Here is the API documentation (Postman ) 
https://documenter.getpostman.com/view/12972403/2s847BSFHH
