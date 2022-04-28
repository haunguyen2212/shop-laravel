<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    use HasFactory;
    protected $table = 'statistical';
    protected $primaryKey = 'statistical_id';
    public $timestamps = false;
    protected $guarded = [];
}
