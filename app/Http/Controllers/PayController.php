<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Exception;


class PayController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::id());
        return view('pay.checkout', compact('user'));
    }

    public function store(Request $request){
    //     DB::beginTransaction();
    //     try
    //     {
            //中間テーブルに追加するにはattach()
            //attach('相手のID',[中間テーブルに保存したい他の情報]
            //1.CartのデータをHistoryに保存
            // $user = User::find(Auth::id());
            // $user->product()->attach($cart->product_id, [

                // 'total_price' => product::find()->total_price,
                // 'product_at' => product::find()->product_at,
                // 'user_id' => user::find()->user_id,
                // 'product_id' => product::find()->product_id,
                // 'amount' => product::find()->amount
            // ]);

            //2.productから在庫を減らす
        //     $product = Product::find($request->product_id);
        //     $product->stock -= $cart->amount;
        //     $product->save();

        //     //3.Cartデータ消す
        //     $cart = Cart::where('user_id',Auth::id());
        //     $cart->get();
        //     $cart->delete();
        //     $cart->save();

        // }catch(Exception $exception){       //hi登録　pro在庫減らす
        //     DB::rollback();
        // }
    }

    public function success()
    {
        return view('pay.success');
    }

}
