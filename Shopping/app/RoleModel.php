<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleModel extends Model
{
    protected $table='roles';
    protected $guarded=[];
    public function permissions(){
        return $this->belongsToMany(PermissionModel::class,'permission_role','role_id','permission_id');

    }

}
