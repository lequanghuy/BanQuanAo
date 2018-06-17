@extends('admin')
@section('sidebar')
    <li class="active"><a href="/admin/employee"><i class="fa fa-users"></i>Nhân sự</a></li>
    <li class=""><a href="/admin/customer"><i class="fa fa-user"></i>Khách hàng</a></li>
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
                        <h2>Quản lí <b>Nhân sự</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i
                                    class="material-icons">&#xE147;</i> <span>Thêm nhân sự</span></a>
                        <a href="/admin/role" class="btn btn-primary" data-toggle="modal"><i
                                    class="material-icons">&#xE147;</i> <span>Thêm quyền</span></a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Quyền</th>
                    <th style="width: 20%;">Họ và tên</th>
                    <th style="width: 15%;">Tên hiển thị</th>
                    <th style="width: 20%;">Email</th>
                    <th style="width: 15%;">Số điện thoại</th>
                    <th style="width: 10%;">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($admin as $key)
                    <tr id="{{ $key->id }}">
                        <td>{{ $key->role->title }}</td>
                        <td>{{ $key->name }}</td>
                        <td>{{ $key->nickname }}</td>
                        <td>{{ $key->email }}</td>
                        <td>{{ $key->telephone }}</td>
                        <td>
                            <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons"
                                                                                             data-toggle="tooltip"
                                                                                             title="Sửa">&#xE254;</i></a>
                            <a href="/admin/delete/{{ $key->id }}" class="delete" data-toggle="modal"><i class="material-icons"
                                                                                                 data-toggle="tooltip"
                                                                                                 title="Xóa">&#xE872;</i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="clearfix">
                <div class="hint-text">Xem <b>{{ $page }}</b> trong số  <b>{{ $count }}</b> nhân sự</div>
                <ul class="pagination">
                    @if($admin->currentPage() != 1)
                        <li class="page-item"><a href="{{ str_replace('/?','/',$admin->url($admin->currentPage() - 1)) }}">Trước</a></li>
                    @endif
                    @for($i = 1; $i <= $admin->lastPage(); $i++ )
                        <li class="page-item {{ ($admin->currentPage() ==$i) ? 'active' : ''  }}"><a href="{{ str_replace('/?','/',$admin->url($i)) }}" class="page-link">{{ $i }}</a></li>
                    @endfor
                    @if($admin->currentPage() != $admin->lastPage())
                        <li class="page-item"><a href="{{ str_replace('/?','/',$admin->url($admin->currentPage() + 1)) }}" class="page-link">Tiếp</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    @if($flash = session('message'))
        <div class="alert alert-success" role="alert">
            {{ $flash }}
        </div>
    @endif
    <!-- create Modal HTML -->
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="/admin/addemployee">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <h4 class="modal-title">Thêm mới nhân sự</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Họ và tên</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Tên hiển thị</label>
                            <input type="text" name="nickname" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                            <label>Mật khẩu</label>
                            <input type="text" class="form-control" name="password" required>
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input type="text" class="form-control" name="telephone" required>
                        </div>
                        <div class="form-group">
                            <label>Phân quyền</label>
                            <select name="role_id" class="form-control">
                                <option value="">Chọn...</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Thoát">
                        <input type="submit" class="btn btn-success" value="Tạo">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="editEmployeeModal" class="modal fade">

    </div>

    <link rel="stylesheet" type="text/css" href="/css/admin/crudproduct.css">
    <script src="/js/admin/employee.js"></script>
@endsection