<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $table = 'comments';
    protected $primaryKey = 'comment_id';

    protected $fillable = [
        'product_id', 'user_id', 'messages', 'created_at', 'updated_at'
    ];
    //protected $guarded = [];

    

    public function product(){
    	return $this->belongsTo(Product::class,'product_id','product_id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'uid');
    }
}
