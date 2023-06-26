<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Admin;
use App\Http\Requests\StoreProductRequest;
use App\Http\Controllers\Admin\Request;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $products = Product::select('id', 'name', 'price')
        ->where('enabled', true)
        ->get();

        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'min:2', 'max:50'],
            'price' => ['required'],
            'stock' => ['required'],
            'filepass' => ['required'],
            'enabled' => ['required', 'boolean'],
            'category_id' => ['required']
        ]);

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'filepass' => $request->filepass,
            'enabled' => $request->enabled,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('product.index')
            ->with('flash_message', '保存しました');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
