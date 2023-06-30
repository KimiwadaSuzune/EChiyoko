<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            カテゴリ編集
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div>
                        <div class="mb-3">
                            <label for="category" class="block font-medium text-gray-700">カテゴリ名</label>
                            <input type="text" id="name" name="name" value="{{ $category->name }}" class="form-input rounded-md shadow-sm">
                        </div>
                        <div class="text-left mt-2">
                            <form method="post" action="{{ route('admin.category.update', $category->id) }}" class="inline-block">
                                @csrf
                                <input type="submit" value="カテゴリ名を更新" class="text-white bg-teal-500 border-0 py-2 px-6 focus:outline-none hover:bg-teal-600 rounded">
                            </form>
                            <form method="post" action="{{ route('admin.category.destroy', $category->id) }}" class="inline-block">
                                @csrf
                                <input type="submit" value="削除" class="text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded" onclick='return confirm("本当に削除しますか？")'>
                            </form>
                        </div>
                    </div>

                    @foreach ($errors->all() as $error)
                        <li><span class="error">{{ $error }}</span></li>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
