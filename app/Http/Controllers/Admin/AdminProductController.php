<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\Category;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $products = Product::all();

        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
//     public function create()
//     {
//         $categories = Category::pluck('name', 'id');

//         return view('admin.product.create', compact('categories'));
//     }

//     public function store(Request $request)
//     {
//         $validated = $request->validate([
//             'name' => ['required', 'min:2', 'max:50'],
//             'price' => ['required'],
//             'stock' => ['required'],
//             'filepass' => ['required'],
//             'enabled' => ['required', 'boolean'],
//             'category_id' => ['required']
//         ]);

//         Product::create($validated);

//         return redirect()->route('admin.product.index')
//             ->with('flash_message', '保存しました');
//     }
//     /**
//      * Display the specified resource.
//      */
//     public function show(string $id)
//     {
//         $product = Product::find($id);
//         return view('admin.product.show', compact('product'));
//     }

//     /**
//      * Show the form for editing the specified resource.
//      */
//     public function edit(string $id)
//     {
//         $product = Product::findOrFail($id);
//         $categories = Category::pluck('name', 'id');

//         return view('admin.product.edit', compact('product', 'categories'));
//     }

//     /**
//      * Update the specified resource in storage.
//      */
//     public function update(UpdateProductRequest $request, Product $product,$id)
//     {
//         $product = Product::findOrFail($id);
//         $product->update($request->validated());

//         return redirect()->route('admin.product.index')
//             ->with('flash_message', '登録情報を更新しました！');
//     }

//     /**
//      * Remove the specified resource from storage.
//      */
//     public function destroy($id)
//     {
//         $product = Product::findOrFail($id);
//         $product->delete();

//         return redirect()->route('admin.product.index');
//     }
}
