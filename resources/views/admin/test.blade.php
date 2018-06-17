<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quản Lý Sản Phẩm</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    {{--<link rel="stylesheet" type="text/css" href="/css/admin/crudproduct.css">--}}
    {{--<script src="/js/admin/crudproduct.js"></script>--}}
</head>
<body>
<div class="container">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Quản lý <b>Sản phẩm</b></h2>
                </div>
                <div class="col-sm-6">
                    <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Thêm mới sản phẩm</span></a>
                    <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Xóa</span></a>
                    <form action="/admin/product/search" method="get">
                        {{ csrf_field() }}
                        <div class="search-box">
                            <div class="input-group">
                                <input type="text" class="form-control search" name="search" placeholder="Tìm theo tên">
                                <button class="input-group-addon tim"><i class="material-icons">&#xE8B6;</i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @yield('content')

    </div>
    @if($flash = session('message'))
        <div class="alert alert-success" role="alert">
            {{ $flash }}
        </div>
    @endif
</div>
<!-- Thêm sản phẩm -->
<div id="addEmployeeModal" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="POST" action="/addproduct">

                <input name="_token" type="hidden" value="{{  csrf_token() }}"/>
                <div class="modal-header">
                    <h4 class="modal-title">THÊM SẢN PHẨM</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Sản Phẩm Dành Cho</label>
                        <select name="sl1" class="form-control sl1">
                            <option value="">Chọn...</option>
                            @foreach($catergory as $cat)
                                <option value="{{ $cat->id  }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Thể Loại</label>
                        <select name="sl2" class="form-control sl2">
                            <option value="">Chọn...</option>
                            <option>Quần áo</option>
                            <option>Giầy</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Chi Tiết Thể Loại</label>
                        <select name="catergorydetails_code" class="form-control sl3">

                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tên Sản Phẩm</label>
                        <input name="name" type="text" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Giá sản phẩm</label>
                        <input name="price" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Ảnh đại diện (Mặt trước)</label>
                        <div class="input-group input-file" name="imagefront">
                            <input name="imagefront" type="text" class="form-control" placeholder='Chọn ảnh...' />
                            <span class="input-group-btn">
        		                <button class="btn btn-primary btn-choose" type="button">Choose</button>
    		                </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Ảnh đại diện (Mặt sau)</label>
                        <div class="input-group input-file" name="imageback">
                            <input name="imageback" type="text" class="form-control" placeholder='Chọn ảnh...' />
                            <span class="input-group-btn">
        		                <button class="btn btn-primary btn-choose" type="button">Choose</button>
    		                </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Ảnh chi tiết 1</label>
                        <div class="input-group input-file" name="mainimage">
                            <input name="mainimage" type="text" class="form-control" placeholder='Chọn ảnh...' />
                            <span class="input-group-btn">
        		                <button class="btn btn-primary btn-choose" type="button">Choose</button>
    		                </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Ảnh phụ chi tiết 1</label>
                        <div class="input-group input-file" name="mainsquare">
                            <input name="mainsquare" type="text" class="form-control" placeholder='Chọn ảnh...' />
                            <span class="input-group-btn">
        		                <button class="btn btn-primary btn-choose" type="button">Choose</button>
    		                </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Ảnh chi tiết 2</label>
                        <div class="input-group input-file" name="detailimagetwo">
                            <input name="detailimagetwo" type="text" class="form-control" placeholder='Chọn ảnh...' />
                            <span class="input-group-btn">
        		                <button class="btn btn-primary btn-choose" type="button">Choose</button>
    		                </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Ảnh phụ chi tiết 2</label>
                        <div class="input-group input-file" name="detailsquaretwo">
                            <input name="detailsquaretwo" type="text" class="form-control" placeholder='Chọn ảnh...' />
                            <span class="input-group-btn">
        		                <button class="btn btn-primary btn-choose" type="button">Choose</button>
    		                </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Ảnh chi tiết 3</label>
                        <div class="input-group input-file" name="detailimagethree">
                            <input name="detailimagethree" type="text" class="form-control" placeholder='Chọn ảnh...' />
                            <span class="input-group-btn">
        		                <button class="btn btn-primary btn-choose" type="button">Choose</button>
    		                </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Ảnh phụ chi tiết 3</label>
                        <div class="input-group input-file" name="detailsquarethree">
                            <input name="detailsquarethree" type="text" class="form-control" placeholder='Chọn ảnh...' />
                            <span class="input-group-btn">
        		                <button class="btn btn-primary btn-choose" type="button">Choose</button>
    		                </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Chi tiết sản phẩm</label>
                        <input name="detail" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Chất liệu</label>
                        <input name="material" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Cách bảo quản</label>
                        <input name="care" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Size</label>
                        <input name="size" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Fit</label>
                        <input name="fit" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Khuyên dùng</label>
                        <input name="advice" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Nhãn hiệu</label>
                        <input name="brands" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Sự kiện đi kèm</label>
                        <select name="event_code" class="form-control">
                            <option value="">Chọn...</option>
                            <option>Giảm giá</option>
                            <option>Mua 1 tặng 1</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Thoát">
                    <input type="submit" class="btn btn-success" value="Thêm">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Sửa sản phẩm -->
<div id="editEmployeeModal" class="modal fade">

</div>
<!-- Xóa sản phẩm -->
<div id="deleteEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Xóa sản phẩm</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>Bạn có thật sự muốn xóa sản phẩm đã chọn?</p>
                <p class="text-warning"><small>Không thể lấy lại bản ghi sau khi xóa.</small></p>
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Thoát">
                <input type="submit" class="btn btn-danger xoahet" value="Xóa">
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" type="text/css" href="/css/admin/crudproduct.css">
<script src="/js/admin/crudproduct.js"></script>
</body>
</html>