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
                            <a href="{{ route('product.show', ['id' => $product->id]) }}" class="col-lg-4 col-md-6">
                                    <div>
                                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="mx-auto mb-4">
                                        <div class="text-center">
                                            <p class="text-sm">{{ $product->name }}</p>
                                            <p class="text-sm">¥{{ number_format($product->price) }}</p>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
