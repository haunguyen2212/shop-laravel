<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecificationType extends Model
{
    use HasFactory;
    protected $table = 'specification_types';
    protected $primaryKey = 'type_id';
    protected $guarded = [];

    public function productSpecification(){
    	return $this->hasMany(ProductSpecification::class,'type_id','type_id');
    }
}
