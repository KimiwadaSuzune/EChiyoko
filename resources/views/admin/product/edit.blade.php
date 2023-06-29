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

                        <div>
                            <label for="category_id">商品名:</label>
                            {{-- <select name="name" id="name" min="0" required>
                                <option value="">選択してください</option>
                                    <option value="{{ $product->id }}" {{ $product->id == $product->category_id ? 'selected' : '' }}>
                                        {{ $product->name }}
                                    </option>
                            </select> --}}
                            <input type="text" id="name" name="name" value="{{ $product->name }}">
                        </div>

                        <div>
                            <label for="price">金額:</label>
                            <input type="number" name="price" id="price" value="{{ $product->price }}" min="0" required>
                        </div>

                        <div>
                            <label for="stock">在庫:</label>
                            <input type="number" name="stock" id="stock" value="{{ $product->stock }}" min="0" required>
                        </div>

                        <div>
                            <label for="filepass">画像:</label>
                            <img src="{{ asset($product->filepass) }}" class="mb-46" width=200" height="200">
                            <input type="file" name="img" id="img">
                        </div>

                        <div>
                            <label for="enabled">表示・非表示:</label>
                            <input type="checkbox" name="enabled" id="enabled" value="1" {{ $product->enabled ? 'checked="checked"' : '' }}>

                        </div>

                        <div>
                            <label for="category_id">カテゴリー:</label>
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
                            <button type="submit">商品を保存</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>



