<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminArticleModel extends Model
{
    protected $table='article';
    protected $guarded=[];
    public function category()
    {
        return $this->belongsTo(AdminPostModel::class,'post_id');
    }
}
