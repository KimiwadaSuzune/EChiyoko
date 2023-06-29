<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Jobs\SendMailJob; // ジョブを読み込む
use App\Jobs\AdminMailJob; // ジョブを読み込む
use Exception;


class PayController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::id());
        return view('pay.checkout', compact('user'));
    }

    public function store(Request $request){
        $user = User::find(Auth::id());
        if($user->product->count() > 0){
            DB::beginTransaction();
            try
            {
                // if($product->stock - $product->pivot->amount !== "0"){

                    // 中間テーブルに追加するにはattach()
                    // attach('相手のID',[中間テーブルに保存したい他の情報]
                    // 1.CartのデータをHistoryに保存
                foreach( $user->product as $product ){
                    if($product->stock - $product->pivot->amount > 0){
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
                    else{
                        continue;
                    }
                }


                    DB::commit();

                    // 非同期 Job を使ってメール送信
                    SendMailJob::dispatch($user->name, $user->product);
                    // 非同期 Job を使ってメール送信
                    AdminMailJob::dispatch($user->name, $user->product);

                    return redirect('/pay/success');

            }catch(Exception $exception){
                    DB::rollback();

                    // return redirect(route('pay.checkout'));
            }
        }
        else{
            return redirect("product")->with('status', 'カートの中身が空です');
        }
    }


    public function success()
    {
        return view('pay.success');
    }

}
