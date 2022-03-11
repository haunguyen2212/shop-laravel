<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table = 'Brands';
    protected $primaryKey = 'brand_id';
    protected $guarded = [];

    public function product(){
    	return $this->hasMany(Product::class,'brand_id','brand_id');
    }

    public function productCategory(){
    	return $this->belongsTo(ProductCategory::class,'product_category_id','product_category_id');
    }
}
