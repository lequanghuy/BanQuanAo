@extends('admin')
@section('sidebar')
    <li class=""><a href="/admin/employee"><i class="fa fa-users"></i>Nhân sự</a></li>
    <li class=""><a href="/admin/customer"><i class="fa fa-user"></i>Khách hàng</a></li>
    <li class=""><a href="/admin/product"><i class="fa fa-shopping-cart"></i>Sản phẩm</a></li>
    <li class="active"><a href="/admin/event"><i class="fa fa-calendar"></i>Sự kiện</a></li>
    <li class=""><a href="/admin/bill"><i class="fa fa-money"></i>Đặt hàng</a></li>
    <li class=""><a href="/admin/blog"><i class="fa fa-file-o"></i>Viết báo</a></li>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Quản lí <b>Sự kiện</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="/admin/event/create" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Thêm mới sự kiện</span></a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th  style="width: 10%;">Mã sự kiện</th>
                    <th>Mô tả</th>
                    <th>Giảm giá</th>
                    <th>Đối tượng</th>
                    <th>Thêm</th>
                    <th>Ngày bắt đầu</th>
                    <th style="width: 13%;">Ngày kết thúc </th>
                    <th>Xóa</th>
                </tr>
                </thead>
                <tbody>
                @foreach($event as $key)
                    <tr class="rowId">
                        <td>{{ $key->code }}</td>
                        <td>{{ $key->description }}</td>
                        <td>{{ $key->saleup*100 }}%</td>
                        <td>{{ $key->target }}</td>
                        <td>{{ $key->bonus }}</td>
                        <td class="datestart">{{ $key->date_start }}</td>
                        <td class="dateend">{{ $key->date_end }}</td>
                        <td>
                            <a href="/deleteevent/{{ $key->id }}" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="clearfix">
                <div class="hint-text">Hiện <b>{{ $page }}</b> sự kiện trong số <b>{{ $count }}</b> sự kiện</div>
                <ul class="pagination">
                    @if($event->currentPage() != 1)
                        <li class="page-item"><a href="{{ str_replace('/?','/',$event->url($event->currentPage() - 1)) }}">Previous</a></li>
                    @endif
                    @for($i = 1; $i <= $event->lastPage(); $i++ )
                        <li class="page-item {{ ($event->currentPage() ==$i) ? 'active' : ''  }}"><a href="{{ str_replace('/?','/',$event->url($i)) }}" class="page-link">{{ $i }}</a></li>
                    @endfor
                    @if($event->currentPage() != $event->lastPage())
                        <li class="page-item"><a href="{{ str_replace('/?','/',$event->url($event->currentPage() + 1)) }}" class="page-link">Next</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title">Add Employee</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" value="Add">
                    </div>
                </form>
            </div>
        </div>
        @if($flash = session('message'))
            <div class="alert alert-success" role="alert">
                {{ $flash }}
            </div>
        @endif
    </div>
    <link rel="stylesheet" type="text/css" href="/css/admin/crudproduct.css">
    <script src="/js/admin/event.js"></script>
@endsection