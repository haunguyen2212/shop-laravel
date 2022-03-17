<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    protected $table = 'provinces';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function district(){
        return $this->hasMany(District::class,'province_id','id');
    }
}
