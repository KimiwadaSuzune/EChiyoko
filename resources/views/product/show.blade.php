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
                        <h1 class="text-lg font-semibold mb-4">商品詳細</h1>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        <div>
                            <img src="{{ asset('images/' . $product->filepass) }}" class="mx-auto mb-4">
                            <div class="text-center">
                                <p>{{ $product->name }}</p>

                                <p>¥{{ number_format($product->price) }}</p>


                            <div class="text-center mt-4">
                                <form method="post" action="{{ route('cart.store', $product->id) }}" >
                                    @csrf
                                      <label for="amount">個数:</label>
                                        <select id="amount" name="amount">
                                            @for ($i = 1; $i <= 100; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    <button value="保存"  class=" text-white bg-teal-500 border-0 py-2 px-6 focus:outline-none hover:bg-teal-600 rounded">カートに入れる</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

