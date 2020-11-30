<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FrontendProductModel extends Model
{
    protected $table='products';
    protected $guarded=[];
    public function productImages(){
        return $this->hasMany(FrontendImageModel::class,'product_id');
    }

}
