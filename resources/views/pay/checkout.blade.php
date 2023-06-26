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
                    @foreach($user->product as $product_data)
                    <tr>
                        <br>
                        <td>{{$product_data->id}}</td>
                        <br>
                        <td>{{$product_data->name}}</td>
                        <br>
                        <td>{{$product_data->pivot->amount}}</td>
                    </tr>
                    @endforeach
                    <form method="post" action="{{ route("pay.store")}}">
                        @csrf
                        <button type="submit" name="add">購入</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
