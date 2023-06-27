<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = User::find(Auth::id());
        return view('cart.index', compact('products'));
    }

    public function store(StoreCartRequest $request)
    {
        $validated = $request->validate([
            'amount' => ['required', 'min:1', 'max:5'],
            'total_price' => ['required'],
        ]);

        $cart = new Cart;
        $cart->amounte = $request->amount;
        $cart->total_price = $request->total_price;
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
