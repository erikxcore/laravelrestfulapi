<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProduct extends Model
{
    protected $fillable = [
        'user_id', 'product_id'
    ];

    // public function user() {
    // 	return $this->belongsTo('App\User', 'id','user_id');
    // }

    // public function product() {
    // 	return $this->belongsTo('App\Product', 'id','product_id');
    // }
}	
