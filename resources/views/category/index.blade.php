

    @if (session('successMessage'))
    <div class="alert alert-success text-center">
    {{ session('successMessage') }}
    @endif

    @if (session('status'))
    <div class="alert alert-success text-center">
    {{ session('status') }}
    @endif
    </div>

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
                    <div>
                        @foreach($categorys as $category)
                        <li><a class="text-blue-400" href="{{ route('admin.category.edit', $category->id)}}"">編集画面</a></li>
                        カテゴリ名: {{ $category->name }}<br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
