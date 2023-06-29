<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = User::find(Auth::id());
        return view('cart.index', compact('user'));
    }

    public function store(StoreCartRequest $request, $id)
    {
        // $validated = $request->validate([
        //     'amount' => ['required', 'min:1', 'max:5'],
        //     'total_price' => ['required'],
        // ]);

        $product = Product::find($id);

        $cart = new Cart;
        $cart->user_id = Auth::id();
        $cart->product_id = $id;
        $cart->amount = $request->input('amount');
        $cart->total_price = $cart->amount * $product->price;
        $cart->save();

        return redirect('/cart');
    }

    public function destroy($id)
    {

        $cart = Cart::find($id);
        $cart->delete();
        return redirect('/cart');
    }
}
