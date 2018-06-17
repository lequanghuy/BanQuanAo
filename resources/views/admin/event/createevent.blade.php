<html>
<head>
    <title>Tạo sự kiện</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <link href='/css/admin/formevent.css' rel='stylesheet' type='text/css'>
    <script src="/js/admin/formevent.js"></script>
</head>
<body>

<div class="container">
            <h1><a href="/admin/event">Quản lí sự kiện</a> / Tạo mới <strong>Sự Kiện</strong></h1>
            <form method="post" action="/event/submit" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="controls">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Mã sự kiện</label>
                                <input type="text" name="code" class="form-control" placeholder="Đặt code sự kiện">
                            </div>
                            <div class="form-group">
                                <label>Mô tả sự kiện</label>
                                <input type="text" name="description" class="form-control" placeholder="Mô tả">
                            </div>
                            <div class="form-group">
                                <label>Thể loại sự kiện</label>
                                <select name="eventcatergory_id" class="form-control ec">
                                    <option value="">Chọn...</option>
                                    <option value="0">Giảm giá</option>
                                    <option value="1">Mua 1 tặng 1</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Phần trăm giá sản phẩm được giảm</label>
                                <input type="text" name="saleup" class="form-control phantram" placeholder="Phần trăm giảm giá">
                            </div>
                            <div class="form-group">
                                <label for="form_message">Ảnh banner</label>
                                <input name="banner" type="file" class="banner">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Loại sản phẩm áp dụng sự kiện</label>
                                <select name="huongden" class="form-control sl1">
                                    <option value="">Chọn...</option>
                                    <option value="0">Nam</option>
                                    <option value="1">Nữ</option>
                                    <option value="2">Theo giá</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Chi tiết sản phẩm</label>
                                <select name="target" class="form-control sl2">

                                </select>
                            </div>
                            <div class="form-group">
                                <label>Xếp theo giá</label>
                                <select name="bonus" class="form-control sl3">
                                    <option value="">Chọn...</option>
                                    @foreach($filter as $key)
                                        <option value="{{ $key->code }}">{{ $key->description }}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Ngày bắt đầu</label>
                                <input type="text" name="date_start" class="form-control start">
                            </div>
                            <div class="form-group">
                                <label>Ngày kết thúc</label>
                                <input type="text" name="date_end" class="form-control end">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <input type="submit" class="btn btn-success btn-send" value="Tạo sự kiện">
                        </div>
                    </div>
                </div>
            </form>


    {{--</div> <!-- /.row-->--}}

</div> <!-- /.container-->


</body>
</html>
