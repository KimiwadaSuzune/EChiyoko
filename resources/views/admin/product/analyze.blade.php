<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            商品分析(全体)
        </h2>
    </x-slot>

    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 text-gray-900 text-center">
    <form action="{{ route('admin.product.analyze')}}" method="get">
        <select name="exist_year">
            @foreach ($existYear as $year)
                <option value="{{ $year }}" {{ $selectYear == $year ? 'selected' : '' }}>{{ $year }}</option>
            @endforeach
        </select>
        <button type="submit" class=" text-white bg-teal-500 border-0 py-2 px-6 focus:outline-none hover:bg-teal-600 rounded">年のグラフを表示</button>
    </form>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        <canvas id="allProduct"></canvas>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
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

