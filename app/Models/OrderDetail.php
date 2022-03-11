<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'order_details';
    protected $primaryKey = 'order_detail_id';
    protected $guarded = [];

    public function order(){
    	return $this->belongsTo(Order::class,'order_id','order_id');
    }

    public function productDetail(){
    	return $this->belongsTo(ProductDetail::class,'product_detail_id','product_detail_id');
    }
}
