<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // protected $dateFormat = 'Y-m-d H:i';

    // protected $casts = [k
    //     'title' => 'json'
    // ];

    use HasFactory;
    protected $guarded = [];


    public function category(){
        return $this->hasOne(Category::class);
    }
    public function subcategory(){
        return $this->hasOne(SubCategory::class,'parent_id','id');
    }
  
}

