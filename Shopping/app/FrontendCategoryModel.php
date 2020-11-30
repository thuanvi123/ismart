<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FrontendCategoryModel extends Model
{
    protected $table='category';
    protected $guarded=[];
    public function childrentCategory(){
        return $this->hasMany(FrontendCategoryModel::class,'parent_id');
    }
    public function products(){
        return $this->hasMany(FrontendProductModel::class,'cat_id');
    }
}
