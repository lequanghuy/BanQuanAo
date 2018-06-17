<!DOCTYPE HTML>
<html>
<head>
    <title>Xem order</title>
</head>

<body>
<div class="content">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thông tin đặt hàng</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Order</th>
                        <th style="width: 15%;">Số điện thoại</th>
                        <th style="width: 40%;">Địa chỉ</th>
                        <th>Email</th>
                        <th style="width: 15%;">Ngày đặt hàng</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order as $key)
                    <tr>
                        <td>#{{ $key->id }}</td>
                        <td>{{ $key->telephone }}</td>
                        <td>{{ $key->address }}, {{ $key->road }}, {{ $key->district }}, {{ $key->city }}</td>
                        <td>{{ $key->email }}</td>
                        <td>{{ date_format($key->created_at, 'd/m/Y') }}</td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</div>


</body>

</html>

