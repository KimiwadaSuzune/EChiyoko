<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function users()
    {
        return $this->belongsToMany(User::class, 'history')
        ->withPivot('amount', 'purchased_at', 'total_price');
    }

    public function user_carts()
    {
        return $this->belongsToMany(User::class, 'cart')
        ->withPivot('amount', 'total_price');
    }


    public function categoies(){
        return $this->hasOne(category::class);
    }
}
