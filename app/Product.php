<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
protected $fillable = ['productcode','name_en','name_ar','itemunitId','itemContent',
      'categoryId','itemrequest','itemmax','itemmin','subsetitem-one','subsetitem-two','itemContentOne','itemContentTwo','itemtitle_id'];


public function Itemunit(){
    return $this->belongsTo(Itemunit::class,'itemunitId','id');
}

    public function category_type(){
        return $this->belongsTo(Categorytype::class,'categoryId','id');
    }

    public function ItemTitle(){
    return $this->belongsTo(ItemTitle::class,'itemtitle_id','id');
    }


}
