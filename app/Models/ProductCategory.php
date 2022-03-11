<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    protected $table = 'product_categories';
    protected $primaryKey = 'product_category_id';
    protected $guarded = [];

    public function product(){
    	return $this->hasMany(Product::class,'product_category_id','product_category_id');
    }

    public function brand(){
    	return $this->hasMany(Brand::class,'product_category_id','product_category_id');
    }
}
