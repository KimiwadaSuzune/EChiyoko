<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class PayController extends Controller
{
    public function index()
    {
        $carts = Cart::all();
        return view('pay.index', compact('carts'));
    }

//     public function store(Request $request){
//         DB::beginTransaction();
//         try
//         {
//             // 4つのテテーブル処理
//             //中間テーブルに追加するにはattach()
//             //attach('相手のID',[中間テーブルに保存したい他の情報]
//             //1.purchaseHistory
//             $cart = Cart::find(Auth::id());
//             $cart->product()->attach($request->cart_id, [
//                 'total_price' => product::find($request->cart_id),
//                 'product_at' => $request->product_ad
//                 'user_id' => $request->user_id
//                 'amount' => $request->amount
//             ]);

//             //2.Item 在庫減らす
//             $cart = Cart::find($request->cart_id);
//             $cart->current_stock -= $request->amount;
//             $item->save();
//     }

//     // public function success()
//     // {
//     //     // $pays = ::all();
//     //     // return view('pay.index', compact(''));
//     // }
// }

}
