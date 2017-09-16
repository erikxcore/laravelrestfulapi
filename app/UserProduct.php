<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProduct extends Model
{
    protected $fillable = [
        'user_id', 'product_id'
    ];

    public function bear() {
        return $this->belongsTo('User');
    }
}
