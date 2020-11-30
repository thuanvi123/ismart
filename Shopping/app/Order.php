<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $guarded = ['*'];
    const STATUS_SUCCESS = 1;
    const STATUS_DEFAULT = 0;
    protected $statusorder = [
        1 => [
            'name' => 'Đã xử lý',
            'class' => 'bg-success'
        ],
        0 => [
            'name' => 'Chưa xử lý',
            'class' => 'bg-warning'
        ]
    ];

    public function getStatus()
    {
        return array_get($this->statusorder,$this->status,'[N\A]');
    }

    public function detail_order()
    {
        return $this->hasMany(OrderDetail::class, 'order_id');
    }
}
