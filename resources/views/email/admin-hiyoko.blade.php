{{ $user }}様がお買い上げになりました。

@foreach ($product as $product_data)
{{ $product_data->name }}
@endforeach
