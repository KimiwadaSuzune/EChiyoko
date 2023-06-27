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
                        <h1 class="text-lg font-semibold mb-4">商品詳細</h1>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        <div>
                            <img src="{{ asset('images/' . $product->filepass) }}" class="mx-auto mb-4">
                            <div class="text-center">
                                <p>{{ $product->name }}</p>
                                <p>カテゴリ{{ $categories->name }}</p>
                                <p>価格：¥{{ number_format($product->price) }}</p>
                                @if($product->enabled)
                                    <p>表示・非表示：表示</p>
                                @else
                                    <p>表示・非表示：非表示</p>
                                @endif
                            </div>
                            <div class="text-center mt-4">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
