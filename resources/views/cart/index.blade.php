<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            カート一覧
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-lg font-semibold mb-4">カート内商品</h1>
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th class="py-2">商品名</th>
                                <th class="py-2">数量</th>
                                <th class="py-2">合計金額</th>
                                <th class="py-2"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products->product as $product)
                                <tr>
                                    <td class="py-2 text-center">
                                        {{ $product->name }}
                                        {{-- {{var_dump($product)}} --}}
                                    </td>

                                    <td class="py-2 text-center">
                                        {{ $product->pivot->amount}}
                                    </td>

                                    <td class="py-2 text-center">
                                            ¥{{ number_format($product->pivot->total_price) }}
                                    </td>

                                    <td class="py-2 text-center">
                                        <form method="post" action="{{ route("cart.destroy", $product->id)}}">
                                            @csrf
                                            <input type="submit" value="削除" onclick='return confirm("本当に削除しますか？")'>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
