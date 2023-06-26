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
                    <form method="post" action="{{ route("admin.category.update", $category->id)}}">
                    @csrf
                        <div>
                            <label for="">カテゴリ名</label>
                            <input type="text" id="name" name="name" value="{{ $category->name }}">
                        </div>
                        <div>
                            <input type="submit" value="更新"/>
                        </div>
                    </form>

                    @foreach ($errors->all() as $error)
                    <li> <span class="error">{{ $error }}</span></li>
                    @endforeach

                    <form method="post" action="{{ route("admin.category.destroy", $category->id)}}">
                        @csrf
                        <input type="submit" value="削除" onclick='return confirm("本当に削除しますか？")'>
                    </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
