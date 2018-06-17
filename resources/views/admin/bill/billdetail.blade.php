
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Simple Data Table</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
        body {
            color: #666;
            background: #f5f5f5;
            font-family: 'Roboto', sans-serif;
        }
        table.table tr th, table.table tr td {
            border-color: #e9e9e9;
        }
        table.table-striped tbody tr:nth-of-type(odd) {
            background-color: #fcfcfc;
        }
        .table-wrapper {
            background: #fff;
            padding: 20px;
            margin: 30px 0;
            box-shadow: 0 1px 1px rgba(0,0,0,.05);
        }
        .pagination {
            margin: 10px 0 5px;
        }
        .pagination li a {
            border: none;
            min-width: 30px;
            min-height: 30px;
            color: #999;
            margin: 0 2px;
            line-height: 30px;
            border-radius: 4px !important;
            text-align: center;
            padding: 0;
        }
        .pagination li a:hover {
            color: #666;
        }
        .pagination li.active a, .pagination li.active a.page-link {
            background: #59bdb3;
        }
        .pagination li.active a:hover {
            background: #45aba0;
        }
        .pagination li:first-child a, .pagination li:last-child a {
            padding: 0 10px;
        }
        .pagination li.disabled a {
            color: #ccc;
        }
        .pagination li i {
            font-size: 17px;
            position: relative;
            top: 1px;
            margin: 0 2px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="table-wrapper">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Ảnh sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
            </tr>
            </thead>
            <tbody>
            @foreach($billdetail as $key)
            <tr>
                <td>{{ $key->id }}</td>
                <td><img src="{{ $key->image }}" width="45" height="45"></td>
                <td>{{ $key->name }}</td>
                <td>{{ number_format($key->price,0,",",".") }} VNĐ</td>
                <td>{{ $key->product_qty }}</td>
            </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>