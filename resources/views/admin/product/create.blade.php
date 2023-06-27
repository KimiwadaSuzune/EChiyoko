<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            商品登録
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-8">

                    </div>
                    <form action="{{ route('admin.product.store') }}" method="POST">
                        @csrf

                        <div>
                            <label for="name">商品名:</label>
                            <input type="text" name="name" id="name" required>
                        </div>

                        <div>
                            <label for="price">金額:</label>
                            <input type="number" name="price" id="price" required>
                        </div>

                        <div>
                            <label for="stock">在庫:</label>
                            <input type="number" name="stock" id="stock" required>
                        </div>

                        <div>
                            <label for="image">画像パス:</label>
                            <input type="text" name="image" id="image" required>
                        </div>

                        <div>
                            <label for="enabled">表示・非表示:</label>
                            <input type="checkbox" name="enabled" id="enabled">
                        </div>

                        <div>
                            <label for="category_id">カテゴリー:</label>
                            <select name="category_id" id="category_id" required>
                                <option value="">選択してください</option>
                                @foreach ($categories as $categoryId => $categoryName)
                                    <option value="{{ $categoryId }}">{{ $categoryName }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <button type="submit">商品を保存</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
