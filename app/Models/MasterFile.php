<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterFile extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function file(){
        return $this->hasOne(SlaveFile::class,'master_file_id','id');
    }
}
