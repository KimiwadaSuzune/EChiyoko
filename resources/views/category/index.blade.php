<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            カテゴリ一覧
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th class="py-2">カテゴリ名</th>
                                <th class="py-2"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="py-2 text-center">
                                    @foreach($categorys as $category)
                                    {{ $category->name }}<br>
                                    @endforeach
                                </td>

                                <td class="py-2 text-center">
                                    @foreach($categorys as $category)
                                    <a href="{{ route('admin.category.edit', $category->id)}}" class=" text-white bg-teal-500 border-0 py-2 px-6 focus:outline-none hover:bg-teal-600 rounded">
                                    <button>編集</button></a>
                                    @endforeach
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
