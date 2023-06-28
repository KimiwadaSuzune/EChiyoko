<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function scopeSearch(Builder $query, $request){

        if($request->new === 'new'){
            $query->orderBy('created_at', 'desc');
        }

        if($request->category){
            $query->where('category_id', $request->category);
        }

        if($request->product_name)
        {
            $query->where('name', 'like', '%' . $request->product_name . '%');
        }

        $query->where('enabled', true);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'histoies')
        ->withPivot('amount', 'purchased_at', 'total_price');
    }

    public function user_carts()
    {
        return $this->belongsToMany(User::class, 'carts')
        ->withPivot('amount', 'total_price', 'id');
    }


    public function categories(){
        return $this->hasMany(category::class);
    }
}
