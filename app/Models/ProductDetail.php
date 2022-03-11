<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;
    protected $table = 'product_details';
    protected $primaryKey = 'product_detail_id';
    protected $guarded = [];

    public function product(){
    	return $this->belongsTo(Product::class,'product_id','product_id');
    }
    
    public function orderDetail(){
    	return $this->hasMany(OrderDetail::class,'product_detail_id','product_detail_id');
    }
}
