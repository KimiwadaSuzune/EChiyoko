<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            購入履歴
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-lg font-semibold mb-4">購入履歴</h1>
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th class="py-2">商品名</th>
                                <th class="py-2">価格</th>
                                <th class="py-2">購入日時</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($histories as $history)
                                <tr>
                                    <td class="py-2">
                                        @if ($history->product)
                                            <a href="{{ route('product.show', ['id' => $history->product->id]) }}" class="text-blue-500 hover:underline">
                                                {{ $history->product->name }}
                                            </a>
                                        @else
                                            商品情報が見つかりません
                                        @endif
                                    </td>
                                    <td class="py-2">
                                        @if ($history->product)
                                            ¥{{ number_format($history->product->price) }}
                                        @endif
                                    </td>
                                    <td class="py-2">{{ $history->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
