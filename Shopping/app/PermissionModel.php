<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermissionModel extends Model
{
    protected $guarded=[];
    protected $table='permissions';
    public function permissionChidrent(){
        return $this->hasMany(PermissionModel::class,'parent_id');
    }
}
