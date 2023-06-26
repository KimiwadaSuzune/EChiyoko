<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            商品一覧
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-8">

                    </div>
                    <div class="text-center">
                        <h3 class="text-lg font-semibold mb-4">All Products</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                            @foreach ($products as $product)
                                <div class="col-span-1">
                                    <a href="{{ route('product.show', ['id' => $product->id]) }}">
                                        <div class="bg-white rounded-lg shadow-md">
                                            <img src="{{ asset($product->filepass) }}" alt="{{ $product->name }}" class="mx-auto my-4 w-32 h-32 object-cover">
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
        </div>
    </div>
</x-app-layout>
