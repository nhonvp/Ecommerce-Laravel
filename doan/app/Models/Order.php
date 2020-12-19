<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'shipping_id',  'customer_id',  'payment_id','order_total','order_status'
    ];

    protected $primaryKey = 'order_id';
    protected $table = 'order';
//    public function login(){
//        return $this->belongsTo('App\Order', 'user');
//    }
}
