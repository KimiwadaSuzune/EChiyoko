<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            登録商品詳細
        </h2>
    </x-slot>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="mb-8">
                            <h1 class="text-lg font-semibold mb-4 text-center">商品詳細</h1>
                        </div>
                    {{-- <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4"> --}}
                        <div>
                            <img src="{{ asset($product->filepass) }}" class="mx-auto mb-46" width=300" height="300">
                            <div class="text-center">
                                <p class="py-2 text-center">商品名:{{ $product->name }}</p>
                                <p class="py-2 text-center">カテゴリ:{{ $product->category->name }}</p>
                                <p class="py-2 text-center">価格:¥{{ number_format($product->price) }}</p>
                                @if($product->enabled)
                                    <p class="py-2 text-center">表示・非表示：表示</p>
                                @else
                                    <p>表示・非表示：非表示</p>
                                @endif
                                <div class="text-right">
                                    <button type="button" onclick="history.back()" class=" text-white bg-teal-500 border-0 py-2 px-6 ">戻る</button>
                                </div>
                            </div>
                            @if ($selectYear !== 0)
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                                <canvas id="allProduct"></canvas>
                                <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
                            </div>
                            <form action="{{ route('admin.product.show', ['id' => $product->id])}}" method="get">
                                <select name="exist_year">
                                    @foreach ($existYear as $year)
                                        <option value="{{ $year }}" {{ $selectYear == $year ? 'selected' : '' }}>{{ $year }}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class=" text-white bg-teal-500 border-0 py-2 px-6 focus:outline-none hover:bg-teal-600 rounded">年のグラフを表示</button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // phpの変数を jsの変数に置き換える必要がある
        const selectYear = <?php echo json_encode($selectYear); ?>;
        const yearArray = <?php echo json_encode($yearArray); ?>;
        const salesArray = <?php echo json_encode($salesArray); ?>;
        const ctx = document.getElementById("allProduct").getContext("2d");
        const myChart = new Chart(ctx, {
        type: "line",
        data: {
            labels: yearArray,
            datasets: [
                {
                    data: salesArray,
                    backgroundColor: [
                        "rgba(255, 99, 132, 0.2)",
                        "rgba(54, 162, 235, 0.2)",
                        "rgba(255, 206, 86, 0.2)",
                        "rgba(75, 192, 192, 0.2)",
                        "rgba(153, 102, 255, 0.2)",
                        "rgba(255, 159, 64, 0.2)",
                    ],
                    borderColor: [
                        "rgba(255, 99, 132, 1)",
                        "rgba(54, 162, 235, 1)",
                        "rgba(255, 206, 86, 1)",
                        "rgba(75, 192, 192, 1)",
                        "rgba(153, 102, 255, 1)",
                        "rgba(255, 159, 64, 1)",
                    ],
                    borderWidth: 1,
                },
            ],
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
            legend: {
                display: false
            }
        },
    });
    </script>
</x-app-layout>
