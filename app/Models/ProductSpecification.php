<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSpecification extends Model
{
    use HasFactory;
    protected $table = 'product_specifications';
    protected $guarded = [];

    public function specificationType(){
    	return $this->belongsTo(SpecificationType::class,'type_id','type_id');
    }

    public function product(){
    	return $this->belongsTo(Product::class,'product_id','product_id');
    }
}
