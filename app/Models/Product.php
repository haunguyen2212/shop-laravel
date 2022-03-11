<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'product_id';
    protected $guarded = [];

    public function productCategory(){
    	return $this->belongsTo(ProductCategory::class,'product_category_id','product_category_id');
    }

    public function brand(){
    	return $this->belongsTo(Brand::class,'brand_id','brand_id');
    }

	public function productDetail(){
    	return $this->hasMany(ProductDetail::class,'product_id','product_id');
    }

    public function comment(){
    	return $this->hasMany(Comment::class,'product_id','product_id');
    }

    public function productSpecification(){
    	return $this->hasMany(ProductSpecification::class,'product_id','product_id');
    }
}
