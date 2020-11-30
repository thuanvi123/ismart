<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryModel extends Model
{
    use SoftDeletes;
    protected $table = 'category';
    protected $guarded = [];
    const STATUS_PUBLIC = 1;
    const STATUS_PRIVATE = 0;
    protected $status = [
        1 =>[
            'name'=>'Public',
            'class'=>'bg-success'
        ],
        0=>[
            'name'=>'Private',
            'class'=>'bg-warning'
        ]
    ];

    public function getStatus()
    {
        return array_get($this->status,$this->c_active,'[N\A]');
    }
}
