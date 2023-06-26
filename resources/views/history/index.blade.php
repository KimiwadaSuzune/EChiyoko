<!DOCTYPE html>
<html>
<head>
    <title>購入履歴</title>
</head>
<body>
    <h1>購入履歴</h1>

    <table>
        <thead>
            <tr>
                <th>注文番号</th>
                <th>商品名</th>
                <th>価格</th>
                <th>購入日時</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($histories as $history)
                <tr>
                    <td>{{ $history->product->filepass }}</td>
                    <td>{{ $history->product->name }}</td>
                    <td>{{ $history->product->price }}</td>
                    <td>{{ $history->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
