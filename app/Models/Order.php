<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'order_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $guarded = [];

    public function user(){
    	return $this->belongsTo(User::class,'customer_id','uid');
    }

    public function orderDetail(){
    	return $this->hasMany(OrderDetail::class,'order_id','order_id');
    }
}
