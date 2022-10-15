
# To Run It in your Computer 
* Clone the Respiraratory

*  Extract the file 
* Run Those Command

   * ```Composer install```
   * ``` php artisan serve --port=8006```
   *   create a database in  in database named ```demo```
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
   *  ``` php artisan migrate ```
   * ```composer require doctrine/dbal ```
   * ``` php artisan db:seed ```
