<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\Category;
use App\Models\History;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
    public function create()
    {
        $categories = Category::pluck('name', 'id');

        return view('admin.product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            // 'name' => ['required', 'min:2', 'max:50'],
            // 'price' => ['required'],
            // 'stock' => ['required'],
            // 'enabled' => ['required', 'boolean'],
            // 'category_id' => ['required'],
            'img' => ['required', 'max:2048', 'mimes:jpg,jpeg,png,gif']
        ]);

        $img = $request->img->store('img', 'public');

        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->filepass = $img;
        $product->enabled = $request->enabled;
        $product->category_id = $request->category_id;
        $product->save();

        return redirect()->route('admin.product.index')
            ->with('flash_message', '保存しました');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $product = Product::find($id);

        $selectYear = $request->exist_year;
        if (!isset($selectYear)) {
            $base = History::select(DB::raw("DATE_FORMAT(purchased_at, '%Y') as year"))
            ->orderBy('year', 'desc')
            ->where('product_id', $id);

            // 商品の存在チェック
            if ($base->exists()) {
                $selectYear = $base->first()->year;
            } else {
                // なかったらグラフを表示しない
                $selectYear = 0;
            }
        }

        $history = History::select(DB::raw("DATE_FORMAT(purchased_at, '%Y-%m') as yearMonth, sum(total_price) as totalPrice"))
        ->groupBy('yearMonth')
        ->orderBy('yearMonth', 'asc')
        ->whereYear('purchased_at', $selectYear)
        ->where('product_id', $id)
        ->get();

        $existYear = History::select(DB::raw("DATE_FORMAT(purchased_at, '%Y') as year"))
        ->groupBy('year')
        ->orderBy('year', 'desc')
        ->where('product_id', $id)
        ->get()
        ->pluck('year')
        ->toArray();

        $yearArray = $history->pluck('yearMonth')->toArray();
        $salesArray = $history->pluck('totalPrice')->toArray();

        // dd($yearArray, $salesArray);

        return view('admin.product.show', compact('product', 'selectYear', 'existYear', 'yearArray', 'salesArray'));
    }

    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $products = Product::all();
        $categories = Category::pluck('name', 'id');

        return view('admin.product.edit', compact('product', 'products', 'categories'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product, $id)
    {
        $img = Product::find($id)->filepass;

        $request->validate([
            // 'name' => ['required', 'min:2', 'max:50'],
            // 'price' => ['required'],
            // 'stock' => ['required'],
            // 'enabled' => ['required', 'boolean'],
            // 'category_id' => ['required'],
            'img' => ['max:2048', 'mimes:jpg,jpeg,png,gif']
        ]);

        $img_request = $request->img;
        if (isset($img_request)) {
            // 現在の画像ファイルの削除
            Storage::disk('public')->delete($img);
            // 選択された画像ファイルを保存してパスをセット
            $img = $img_request->store('img', 'public');
        }

        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->filepass = $img;
        $product->enabled = $request->enabled;
        $product->category_id = $request->category_id;
        $product->save();

        return redirect()->route('admin.product.index')
            ->with('flash_message', '登録情報を更新しました！');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product->filepass){
            Storage::disk('public')->delete($product->filepass);
        }
        $product->destroy($id);

        return redirect()->route('admin.product.index');
    }

    public function analyze(Request $request){
        $selectYear = $request->exist_year;
        if (!isset($selectYear)) {
            $selectYear = History::select(DB::raw("DATE_FORMAT(purchased_at, '%Y') as year"))
            ->orderBy('year', 'desc')
            ->first()->year;
        }

        $history = History::select(DB::raw("DATE_FORMAT(purchased_at, '%Y-%m') as yearMonth, sum(total_price) as totalPrice"))
        ->groupBy('yearMonth')
        ->orderBy('yearMonth', 'asc')
        ->whereYear('purchased_at', $selectYear)
        ->get();

        $existYear = History::select(DB::raw("DATE_FORMAT(purchased_at, '%Y') as year"))
        ->groupBy('year')
        ->orderBy('year', 'desc')
        ->get()
        ->pluck('year')
        ->toArray();

        $yearArray = $history->pluck('yearMonth')->toArray();
        $salesArray = $history->pluck('totalPrice')->toArray();

        // dd($yearArray, $salesArray);

        return view('admin.product.analyze', compact('selectYear', 'existYear', 'yearArray', 'salesArray'));
    }

}
