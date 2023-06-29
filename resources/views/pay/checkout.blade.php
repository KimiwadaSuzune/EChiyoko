<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            購入画面
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-lg font-semibold mb-4">購入確認画面</h1>
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
                            @php
                                $sumPrice = 0;
                            @endphp
                            @foreach($user->product as $product_data)
                            @php
                                $sumPrice += $product_data->pivot->total_price
                            @endphp

                            <tr >
                                <td class="py-2 text-center" style="border-bottom: 1px solid rgb(172, 172, 172)">
                                    {{$product_data->name}}
                                </td>

                                <td class="py-2 text-center" style="border-bottom: 1px solid rgb(172, 172, 172)">
                                    {{$product_data->pivot->amount}}
                                </td>

                                <td class="py-2 text-center" style="border-bottom: 1px solid rgb(172, 172, 172)">
                                    {{$product_data->pivot->total_price}}
                                </td>
                                <td class="py-2 text-center">
                                </td>
                            </tr>
                            @endforeach

                            <tr>
                                <td colspan="3" class="py-2 text-right font-semibold">
                                    カートの合計金額：￥{{ $sumPrice }}
                                </td>
                            </tr>

                            <tr>
                                <td colspan="4" class="py-2 text-center">
                                    <div class="flex justify-end">
                                        <form method="post" action="{{ route('pay.store') }}">
                                            @csrf
                                            <button type="submit" name="add" class="text-white bg-teal-500 border-0 py-2 px-6 focus:outline-none hover:bg-teal-600 rounded">商品を購入する</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
