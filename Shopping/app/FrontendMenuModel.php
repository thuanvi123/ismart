<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FrontendMenuModel extends Model
{
    protected $table='menus';
    public function childrentMenu(){
        return $this->hasMany(FrontendMenuModel::class,'parent_id');
    }
}
