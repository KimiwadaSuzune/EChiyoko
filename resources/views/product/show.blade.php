<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            商品詳細
        </h2>
    </x-slot>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="mb-8">
                            <h1 class="text-lg font-semibold mb-4 text-center">商品詳細</h1>
                        </div>
                        <div>
                            <img src="{{ asset($product->filepass) }}" class="mx-auto mb-46>
                            <div class="text-center">
                                <p class="py-2 text-center">商品名:{{ $product->name }}</p>
                                <p class="py-2 text-center">カテゴリ:{{ $product->category->name }}</p>
                                <p class="py-2 text-center">価格：¥{{ number_format($product->price) }}</p>
                                <div class="text-center mt-4">
                                    <form method="post" action="{{ route('cart.store', $product->id) }}" >
                                        @csrf
                                        <label for="amount">個数:</label>
                                        <select id="amount" name="amount">
                                            @for ($i = 1; $i <= $product->stock; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                        <br>
                                    </form>
                                    <div style="padding-top:10px;">
                                        <button value="保存"  class="text-white bg-teal-500 border-0 py-2 px-6 focus:outline-none hover:bg-teal-600 rounded">カートに入れる</button>
                                    </div>
                                </div>


                                <div class="text-right">
                                    <button type="button" onclick="history.back()" class=" text-white bg-teal-400 border-0 py-2 px-6 hover:bg-teal-600 rounded">一覧に戻る</button>
                                </div>
                                <br>
                                <div class="text-right">
                                    <form method="get" action="{{ route('cart.index')}}" >
                                        @csrf
                                        <button value=""  class=" text-white bg-teal-400 border-0 py-2 px-6 focus:outline-none hover:bg-teal-600 rounded">カートに戻る</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
