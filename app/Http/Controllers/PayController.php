<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
        DB::beginTransaction();
        try
        {
            // 中間テーブルに追加するにはattach()
            // attach('相手のID',[中間テーブルに保存したい他の情報]
            // 1.CartのデータをHistoryに保存
            $user = User::find(Auth::id());
            foreach( $user->product as $product ){
                $user->product_history()->attach($product->id,[
                'amount' => $product->pivot->amount,
                'purchased_at' =>Carbon::now(),
                'total_price' => $product->pivot->total_price,
                ]);

                // 2.productから在庫を減らす
                $product_data = Product::find($product->id);
                $product_data->stock -= $product->pivot->amount;
                $product_data->save();

                //3.Cartデータ消す
                $user->product()->detach($product->id);
            }

            DB::commit();
            return redirect('/pay/success');

        }catch(Exception $exception){
            DB::rollback();
            // return redirect(route('pay.checkout'));
        }
    }


    public function success()
    {
        return view('pay.success');
    }

}
