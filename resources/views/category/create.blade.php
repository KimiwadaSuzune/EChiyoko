<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            カテゴリ登録
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="post" action="{{ route("admin.category.store")}}">
                        <div>
                            <label>カテゴリ名</label>
                            <input type="text" id="name" name="name" value="{{ old('name')}}">
                        </div>
                        <div class="text-right">
                            @csrf
                            <button type="submit" name="送信" class=" text-white bg-teal-500 border-0 py-2 px-6 focus:outline-none hover:bg-teal-600 rounded">登録</button>
                        </div>
                    </form>
                    @foreach ($errors->all() as $error)
                    <li> <span class="error">{{ $error }}</span></li>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

