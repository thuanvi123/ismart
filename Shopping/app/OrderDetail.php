<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table='order_detail';
    protected $guarded=['*'];
    public function product(){
        return $this->belongsTo(ProductModel::class,'pro_id');

    }

}
