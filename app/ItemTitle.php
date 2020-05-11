<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemTitle extends Model
{
    protected $fillable = ['id','itemtitle_ar','itemtitle_en'];

    public function products(){
        return $this->hasMany(Product::class,'itemtitle_id','id');
    }
}
