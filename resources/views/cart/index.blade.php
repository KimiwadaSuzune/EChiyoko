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
                                <th class="py-2"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user->product as $product)
                                <tr class="cart">
                                    <td class="py-2 text-center" style="border-bottom: 1px solid rgb(172, 172, 172);">
                                        {{ $product->name }}
                                    </td>

                                    <td class="py-2 text-center" style="border-bottom: 1px solid rgb(172, 172, 172);">
                                        {{ $product->pivot->amount}}
                                    </td>

                                    <td class="py-2 text-center" style="border-bottom: 1px solid rgb(172, 172, 172);">
                                        ¥{{ number_format($product->pivot->total_price) }}
                                    </td>

                                    <td class="py-2 text-center" style="border-bottom: 1px solid rgb(172, 172, 172);">
                                        <form method="get" action="{{ route('product.show', ['id' => $product->id]) }}">
                                        @csrf
                                            <button value="詳細" class=" text-white bg-teal-500 border-0 py-2 px-6 focus:outline-none hover:bg-teal-600 rounded">詳細</button>
                                        </form>
                                    </td>

                                    <td class="py-2 text-center" style="border-bottom: 1px solid rgb(172, 172, 172);">
                                        <form method="post" action="{{ route("cart.destroy", $product->pivot->id)}}">
                                            @csrf
                                            @method("DELETE")
                                            <button value="削除" onclick='return confirm("本当に削除しますか？")' class=" text-white bg-gray-500 border-0 py-2 px-6 focus:outline-none hover:bg-gray-600 rounded">削除</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            @if ($user->product->count() > 0)
                            <td class="text-center">
                                <div style="padding-top:20px;">
                                    <a href="{{ route('pay.checkout') }}" class=" text-white bg-yellow-400 border-0 py-2 px-6 focus:outline-none hover:bg-yellow-500 rounded">
                                        <button>購入する</button>
                                    </a>
                                </div>
                            </td>
                            @else
                                <div class="text-center">
                                    <td>
                                        商品がありません
                                    </td>
                                </div>
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
