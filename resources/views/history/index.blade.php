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
                    <head>
                        <title>購入履歴</title>
                    </head>
                    <body>
                        <h1>購入履歴</h1>
                        <table>
                            <thead>
                                <tr>
                                    <th>商品名</th>
                                    <th>価格</th>
                                    <th>購入日時</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($histories as $history)
                                    <tr>
                                        <td>{{ $history->product->filepass }}</td>
                                        <td>{{ $history->product->name }}</td>
                                        <td>{{ $history->product->price }}</td>
                                        <td>{{ $history->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </body>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

