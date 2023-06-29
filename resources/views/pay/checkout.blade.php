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
                            @foreach($user->product as $product_data)
                            <tr>
                                <td class="py-2 text-center">
                                    {{$product_data->name}}
                                    {{$product_data->pivot->total_price}}
                                </td>

                                <td class="py-2 text-center">
                                    {{$product_data->pivot->amount}}
                                </td>

                                <td class="py-2 text-center">
                                    {{$product_data->pivot->total_price}}
                                </td>
                            </tr>
                            @endforeach
                            <td class="py-2 text-center">
                                <form method="post" action="{{ route("pay.store")}}">
                                    @csrf
                                    <button type="submit" name="add" class=" text-white bg-teal-500 border-0 py-2 px-6 focus:outline-none hover:bg-teal-600 rounded">購入</button>
                                </form>
                            </td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
