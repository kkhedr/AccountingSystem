<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
protected $fillable = ['productcode','name_en','name_ar','itemunitId','itemContent',
      'categoryId','subsetitem','itemrequest','itemmax','itemmin'];


public function Itemunit(){
    return $this->belongsTo(Itemunit::class,'itemunitId','id');
}

    public function category_type(){
        return $this->belongsTo(Categorytype::class,'categoryId','id');
    }
}
