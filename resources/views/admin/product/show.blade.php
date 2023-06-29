<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            登録商品詳細
        </h2>
    </x-slot>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="mb-8">
                            <h1 class="text-lg font-semibold mb-4 text-center">商品詳細</h1>
                        </div>
                    {{-- <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4"> --}}
                        <div>
                            <img src="{{ asset($product->filepass) }}" class="mx-auto mb-46>
                            <div class="text-center">
                                <p class="py-2 text-center">商品名:{{ $product->name }}</p>
                                <p class="py-2 text-center">カテゴリ:{{ $product->category->name }}</p>
                                <p class="py-2 text-center">価格：¥{{ number_format($product->price) }}</p>
                                @if($product->enabled)
                                    <p class="py-2 text-center">表示・非表示：表示</p>
                                @else
                                    <p>表示・非表示：非表示</p>
                                @endif
                                <div class="text-right">
                                    <button type="button" onclick="history.back()" class=" text-white bg-teal-500 border-0 py-2 px-6 ">戻る</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
