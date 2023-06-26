<x-app-layout>
@foreach($user->product as $product_data)
<tr>
    <br>
    <td>{{$product_data->id}}</td>
    <br>
    <td>{{$product_data->name}}</td>
    <br>
    <td>{{$product_data->pivot->amount}}</td>
</tr>
@endforeach
</x-app-layout>
