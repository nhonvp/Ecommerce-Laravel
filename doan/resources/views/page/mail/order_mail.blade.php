<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>{{$title}}</h1>
<h3>
    <table class="table" border="1" cellpadding="10" cellspacing="0" width="500">
        <tr>
            <th scope="col">Tên Người Nhận</th>
            <th scope="col">Total</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">{{$order_mail->customer_name}}</th>
{{--            <th scope="row">{{$order_mail->product_name}}</th>--}}
{{--            <th scope="row">{{$order_mail->product_sales_quantity}}</th>--}}
            <th scope="row">{{$order_mail->order_total}} VND</th>
        </tr>
        </tbody>
    </table>
    <p>Cảm Ơn quý khách đã tin tưởng shop</p>
    <h3>Lần Sau Đừng mua hàng ủng hộ em nữa nhé</h3>
</h3>
</body>
</html>
