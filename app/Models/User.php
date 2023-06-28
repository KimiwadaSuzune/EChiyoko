<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Product;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


      // 多対多の場合は(中間テーブルではなく)相手のモデルを指定
    public function product_history(){
        return $this->belongsToMany(Product::class, 'histories')
        ->withPivot('amount', 'purchased_at', 'total_price'); //中間テーブルの列の名前
    }

      // 多対多の場合は(中間テーブルではなく)相手のモデルを指定
    public function product(){
        return $this->belongsToMany(Product::class, 'carts')
        ->withPivot('amount', 'total_price', 'id'); //中間テーブルの列の名前
    }



    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
