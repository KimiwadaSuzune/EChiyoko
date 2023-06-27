<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            登録商品一覧
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-8">

                    </div>
                    <div class="text-center">
                        <h3 class="text-lg font-semibold mb-4">登録済み商品一覧</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                            @foreach ($products as $product)
                                <div class="col-span-1">
                                    <a href="{{ route('admin.product.show', ['id' => $product->id]) }}">
                                        <div class="bg-white rounded-lg shadow-md">
                                            {{-- <img src="{{ asset($product->filepass) }}" alt="{{ $product->name }}" class="mx-auto my-4 w-32 h-32 object-cover"> --}}
                                            <div class="p-4">
                                                <p class="text-sm">{{ $product->name }}</p>
                                                <p class="text-sm">¥{{ number_format($product->price) }}</p>
                                                <p class="text-sm">在庫数：{{ number_format($product->stock) }}</p>
                                                <a href="{{ route('admin.product.edit', ['id' => $product->id]) }}"class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                    編集
                                                </a>
                                                <form id="update-form" action="{{ route('admin.product.update', ['id' => $product->id]) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('PUT')
                                                </form>
                                                <a href="{{ route('admin.product.destroy', ['id' => $product->id]) }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                                    削除
                                                </a>
                                                <form id="delete-form" action="{{ route('admin.product.destroy', ['id' => $product->id]) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
