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
                    <div class="text-center">
                        <h3 class="text-lg font-semibold mb-4">登録済み商品一覧</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                            @foreach ($products as $product)
                                <div class="col-span-1">
                                    <a href="{{ route('admin.product.show', ['id' => $product->id]) }}">
                                        <div class="bg-white rounded-lg shadow-md">
                                            {{-- <img src="{{ asset($product->filepass) }}" alt="{{ $product->name }}" class="mx-auto my-4 w-32 h-32 object-cover"> --}}
                                            <div class="p-4">
                                                @if ($product->filepass)
                                                <img src="{{ asset($product->filepass) }}" alt="{{ $product->name }}" class="mx-auto my-4 w-32 h-32 object-cover">
                                                @else
                                                <img src="{{ asset('images/noImage.jpg') }}" class="mx-auto my-4 w-32 h-32 object-cover" alt="noImages">
                                                @endif
                                                <p class="text-sm">{{ $product->name }}</p>
                                                <p class="text-sm">¥{{ number_format($product->price) }}</p>
                                                <p class="text-sm">在庫数：{{ number_format($product->stock) }}</p>
                                                {{-- <a href="{{ route('admin.product.edit', ['id' => $product->id]) }}"class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                    編集
                                                </a> --}}
                                                <div>
                                                    <div class="flex justify-center">
                                                        <div>
                                                            <form id="edit-form" action="{{ route('admin.product.edit', ['id' => $product->id]) }}" method="GET">
                                                                @csrf
                                                                <button type="submit" class="text-white bg-teal-500 border-0 py-2 px-6 hover:bg-teal-600 rounded m-2">編集</button>
                                                            </form>
                                                        </div>
                                                        <div>
                                                            <form id="delete-form" action="{{ route('admin.product.destroy', ['id' => $product->id]) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" onclick="return confirm('本当に削除しますか？')" class="text-white bg-gray-500 border-0 py-2 px-6 hover:bg-gray-600 rounded m-2">削除</button>
                                                            </form>
                                                        </div>
                                                    </div>

                                                </div>
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
