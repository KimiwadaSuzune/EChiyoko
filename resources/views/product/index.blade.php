<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            商品一覧
        </h2>
    </x-slot>

    <div class="max-w-7xl sm:px-6 lg:px-8 py-8">
        <div class="bg-white shadow-sm sm:rounded-lg">
            <div class="p-6 text-center">
                <form method="GET" action="{{ route("product.index")}}">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">商品名</label>
                        <!--入力-->
                        <div class="col-sm-5">
                        <input type="text" class="form-control" name="product_name">
                        </div>
                    </div>
                    <!--プルダウンカテゴリ選択-->
                    <div class="form-group row">
                        <label class="col-sm-2">商品カテゴリ</label>
                        <div class="col-sm-3">
                        <select name="category" class="form-control">
                            <option value="">未選択</option>

                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">
                            {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <input type="checkbox" name="new" value="new">新着順
                    </div>
                    <div class="col-sm-auto">
                        <x-primary-button type="submit" class="btn btn-primary ">検索</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 text-center">
                <h3 class="text-lg font-semibold mb-4">All Products</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach ($products as $product)
                        <div class="col-span-1">
                            <a href="{{ route('product.show', ['id' => $product->id]) }}">
                                <div class="bg-white rounded-lg shadow-md">
                                    <img src="{{ asset('img/' . $product->filepass) }}" alt="{{ $product->name }}" class="mx-auto my-4 w-32 h-32 object-cover">
                                    <div class="p-4">
                                        <p class="text-sm">{{ $product->name }}</p>
                                        <p class="text-sm">¥{{ number_format($product->price) }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
