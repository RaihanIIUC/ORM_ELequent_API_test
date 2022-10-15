<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        // return $this->hasOne(Product::class,'item_id','id');
    }

    public function files(){
        return $this->hasMany(MasterFile::class,'item_id','id');
    }
}


