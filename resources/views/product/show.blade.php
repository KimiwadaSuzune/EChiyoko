//商品詳細
<x-app-layout>
    <div>
        <div>
            All Products
        </div>
        <div>
            @foreach ($products as $product)
            <a href="#" class="col-lg-4 col-md-6">
                <div>
                    <img src="{{ asset($product->image) }}"/>
                    <div>
                        <p>{{ $product->name }}</p>
                        <p>¥{{ number_format($product->price)}} </p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</x-app-layout>
