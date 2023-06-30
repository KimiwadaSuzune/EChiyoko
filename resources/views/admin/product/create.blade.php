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
                    <table class="w-full">
                    <thead>
                        <tr>
                            <th class="py-2">画像</th>
                            <th class="py-2 ">商品名</th>
                            <th class="py-2">金額</th>
                            <th class="py-2">在庫</th>
                            <th class="py-2">表示</th>
                            <th class="py-2">カテゴリ</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr class="cart">
                    <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <td class="py-2">
                            <input type="file" name="img" id="img">
                        </td>

                        <td class="py-2">
                            <input type="text" name="name" id="name" min="2" max="100" required>
                        </td>

                        <td class="py-2">
                            <input type="number" name="price" id="price" min="0" required>
                        </td>

                        <td class="py-2">
                            <input type="number" name="stock" id="stock" min="0"required>
                        </td>

                        <td class="py-2 flex justify-center">
                            <input type="checkbox" name="enabled" id="enabled">
                        </td>

                        <td class="py-2">
                            <select name="category_id" id="category_id" required>
                                <option value="">選択してください</option>
                                @foreach ($categories as $categoryId => $categoryName)
                                    <option value="{{ $categoryId }}">{{ $categoryName }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <td class="text-center">
                            <button type="submit" class=" text-white bg-teal-500 border-0 py-2 px-6 focus:outline-none hover:bg-teal-600 rounded">商品を保存</button>
                        </td>
                    </form>
                    @foreach ($errors->all() as $error)
                    <span class="error">{{ $error }}</span>
                    @endforeach
                </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
