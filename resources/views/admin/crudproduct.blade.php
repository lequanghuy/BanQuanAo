@extends('admin')
@section('sidebar')
    <li class=""><a href="/admin/employee"><i class="fa fa-users"></i>Nhân sự</a></li>
    <li class=""><a href="/admin/customer"><i class="fa fa-user"></i>Khách hàng</a></li>
    <li class="active"><a href="/admin/product"><i class="fa fa-shopping-cart"></i>Sản phẩm</a></li>
    <li class=""><a href="/admin/event"><i class="fa fa-calendar"></i>Sự kiện</a></li>
    <li class=""><a href="/admin/bill"><i class="fa fa-money"></i>Đặt hàng</a></li>
    <li class=""><a href="/admin/blog"><i class="fa fa-file-o"></i>Viết báo</a></li>
@endsection
@section('content')
    <div class="container-fluid">
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
            @yield('content1')
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
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Tên Sản Phẩm</label>
                                <input name="name" type="text" class="form-control" placeholder="Tên...">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Giá sản phẩm</label>
                                <input name="price" type="text" class="form-control" placeholder="VNĐ">
                            </div>
                        </div>
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

                        <div class="row">
                            <div class="col-md-6">
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
                            </div>
                            <div class="col-md-6">
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
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Nhãn hiệu</label>
                                <input name="brands" type="text" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Sự kiện đi kèm</label>
                                <input disabled name="event_code" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Chi tiết sản phẩm</label>
                            <input name="detail" type="text" class="form-control">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Chất liệu</label>
                                    <input name="material" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Cách bảo quản</label>
                                    <input name="care" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Size</label>
                                    <input name="size" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Fit</label>
                                    <input name="fit" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Khuyên dùng</label>
                            {{--<input name="advice" type="text" class="form-control">--}}
                            <textarea name="advice" class="form-control"></textarea>
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
@endsection

@section('javascript')
    <link rel="stylesheet" type="text/css" href="/css/admin/crudproduct.css">
    <script src="/js/admin/crudproduct.js"></script>
@endsection
