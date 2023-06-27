{{ $user }}様、お買い上げありがとうございます。

@foreach ($product as $product_data)
{{ $product_data->name }}
@endforeach
