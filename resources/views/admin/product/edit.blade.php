<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            登録商品情報の編集
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-8"></div>
                    <form action="{{ route('admin.product.update', ['id' => $product->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="filepass" class="block font-medium text-gray-700">画像:</label>
                            <img src="{{ asset($product->filepass) }}" class="mb-45" width=300" height="300">
                            <input type="file" name="img" id="img" class="form-input rounded-md shadow-sm " required>
                        </div>
                        <div class="mb-4">
                            <label for="category_id" class="block font-medium text-gray-700">商品名:</label>
                            <input type="text" id="name" name="name" value="{{ $product->name }}" class="form-input rounded-md shadow-sm" required>
                        </div>
                        <div class="mb-4">
                            <label for="price" class="block font-medium text-gray-700">金額:</label>
                            <input type="number" name="price" id="price" value="{{ $product->price }}" class="form-input rounded-md shadow-sm" min="1" required>
                        </div>
                        <div class="mb-4">
                            <label for="stock" class="block font-medium text-gray-700">在庫:</label>
                            <input type="number" name="stock" id="stock" value="{{ $product->stock }}" class="form-input rounded-md shadow-sm" min="1" required>
                        </div>
                        <div class="mb-3">
                            <label for="enabled" class="block font-medium text-gray-700">表示する:</label>
                            <input type="checkbox" name="enabled" id="enabled" value="1" class="form-input rounded-md shadow-sm" {{ $product->enabled ? 'checked="checked"' : '' }}>

                        </div>
                        <div class="mb-4">
                            <label for="category_id" class="block font-medium text-gray-700">カテゴリー:</label>
                            <select name="category_id" id="category_name" required>
                                <option value="">選択してください</option>
                                @foreach ($categories as $categoryId => $categoryName)
                                    <option value="{{ $categoryId }}" {{ $product->category_id == $categoryId ? 'selected' : '' }}>
                                        {{ $categoryName }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <button type="submit"  class="text-white bg-teal-500 border-0 py-2 px-6 focus:outline-none hover:bg-teal-600 rounded">商品を保存</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>



