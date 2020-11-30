<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuModel extends Model
{
    use SoftDeletes;
    protected $table='menus';
    protected $guarded=[];
}
