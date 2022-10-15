
# To Run It in your Computer 
* Clone the Respiraratory

*  Extract the file 
* Run Those Command

   * ```Composer install```
   * ``` php artisan serve --port=8000```
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


## Elequent Relationships on Code 

```
class Item extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function locations(){
        return  $this->hasOne(Location::class,'item_id','id');
    }
    public function added_by()
    {
        return $this->belongsTo(User::class,'user_id','id')->select('id','name','email');
    }

    public function product()
    {
        return $this->hasMany(Product::class,'item_id','id');
    }

    public function files(){
        return $this->hasMany(MasterFile::class,'item_id','id');
    }
}
```


```
class Location extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class,'added_by','id');
    } 
}
```

```
class Product extends Model
{
     

    use HasFactory;
    protected $guarded = [];


    public function category(){
        return $this->hasOne(Category::class);
    }
    public function subcategory(){
        return $this->hasOne(SubCategory::class,'parent_id','id');
    }
  
}
```

```
class Category extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function product(){
        return  $this->belongsTo(Product::class);
    }
}
```

```
class MasterFile extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function file(){
        return $this->hasOne(SlaveFile::class,'master_file_id','id');
    }
}
```


