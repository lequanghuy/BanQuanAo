@extends('admin')
@section('sidebar')
    <li class=""><a href="/admin/employee"><i class="fa fa-users"></i>Nhân sự</a></li>
    <li class="active"><a href="/admin/customer"><i class="fa fa-user"></i>Khách hàng</a></li>
    <li class=""><a href="/admin/product"><i class="fa fa-shopping-cart"></i>Sản phẩm</a></li>
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
                        <h2>Thông tin <b>Khách hàng</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <form action="/admin/customer/search" method="get">
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
            <div class="clearfix">
                <div class="hint-text">Xem <b>{{ $page }}</b> trong số  <b>{{ $count }}</b> người dùng</div>
                <ul class="pagination">
                    @if($user->currentPage() != 1)
                        <li class="page-item"><a href="{{ str_replace('/?','/',$user->url($user->currentPage() - 1)) }}">Trước</a></li>
                    @endif
                    @for($i = 1; $i <= $user->lastPage(); $i++ )
                        <li class="page-item {{ ($user->currentPage() ==$i) ? 'active' : ''  }}"><a href="{{ str_replace('/?','/',$user->url($i)) }}" class="page-link">{{ $i }}</a></li>
                    @endfor
                    @if($user->currentPage() != $user->lastPage())
                        <li class="page-item"><a href="{{ str_replace('/?','/',$user->url($user->currentPage() + 1)) }}" class="page-link">Tiếp</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="editEmployeeModal" class="modal fade">

    </div>
    <div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Employee</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete these Records?</p>
                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <link rel="stylesheet" type="text/css" href="/css/admin/crudproduct.css">
    <script src="/js/admin/customer.js"></script>
@endsection