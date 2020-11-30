<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductModel extends Model
{
    protected $table='products';
    protected $guarded=[];
    public function detailProductImages(){
        return $this->hasMany(ProductImageModel::class,'product_id');
    }
    public function tag(){
        return $this->belongsToMany(TagModel::class,'product_tags','product_id','tag_id')->withTimestamps();
    }
    public function category()
    {
        return $this->belongsTo(CategoryModel::class,'cat_id');
    }
    public function productImage(){
        return $this->hasMany(ProductImageModel::class,'product_id');
    }
    public function orders(){
        return $this->belongsToMany(Order::class,'order_detail','order_id','pro_id')->withTimestamps();
    }

}
