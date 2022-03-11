<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;

    protected $table = 'Wards';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function district(){
        return $this->belongsTo(Province::class,'district_id','id');
    }
}