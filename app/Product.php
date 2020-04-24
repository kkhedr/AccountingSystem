<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
protected $fillable = ['productcode','name_en','name_ar','itemunitId','itemContent','categoryId'];


public function Itemunit(){
    return $this->hasOne(Itemunit::class,'itemunitId','id');
}

    public function category_type(){
        return $this->hasOne(Categorytype::class,'categoryId','id');
    }
}
