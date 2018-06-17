@extends('admin')
@section('sidebar')
    <li class=""><a href="/admin/employee"><i class="fa fa-users"></i>Nhân sự</a></li>
    <li class=""><a href="/admin/customer"><i class="fa fa-user"></i>Khách hàng</a></li>
    <li class=""><a href="/admin/product"><i class="fa fa-shopping-cart"></i>Sản phẩm</a></li>
    <li class=""><a href="/admin/event"><i class="fa fa-calendar"></i>Sự kiện</a></li>
    <li class="active"><a href="/admin/bill"><i class="fa fa-money"></i>Đặt hàng</a></li>
    <li class=""><a href="/admin/blog"><i class="fa fa-file-o"></i>Viết báo</a></li>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-4">
                        <h2>Quản lí <b>Đơn đặt hàng</b></h2>
                    </div>
                </div>
            </div>
            <div class="table-filter">
                <div class="row">
                    <div class="col-sm-9">
                        <button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button>
                        <div class="filter-group">
                            <label>Name</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="filter-group">
                            <label>Location</label>
                            <select class="form-control">
                                <option>All</option>
                                <option>Berlin</option>
                                <option>London</option>
                                <option>Madrid</option>
                                <option>New York</option>
                                <option>Paris</option>
                            </select>
                        </div>
                        <div class="filter-group">
                            <label>Status</label>
                            <select class="form-control">
                                <option>Any</option>
                                <option>Delivered</option>
                                <option>Shipped</option>
                                <option>Pending</option>
                                <option>Cancelled</option>
                            </select>
                        </div>
                        <span class="filter-icon"><i class="fa fa-filter"></i></span>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Khách hàng</th>
                    <th>Số điện thoại</th>
                    <th>Địa điểm</th>
                    <th>Ngày đặt hàng</th>
                    <th>Thời gian</th>
                    <th>Status</th>
                    <th>Tổng tiền</th>
                    <th>Chi tiết</th>
                </tr>
                </thead>
                <tbody>
                @foreach($bill as $key)
                    <tr>
                        <td>{{ $key->id }}</td>
                        <td><a href="#">{{ $key->user->name }}</a></td>
                        <td>{{ $key->telephone }}</td>
                        <td>{{ $key->address }}, {{ $key->road }}, {{ $key->district }}, {{ $key->city }}</td>
                        <td>{{ date_format($key->created_at, 'd/m/Y') }}</td>
                        <td>{{ date_format($key->created_at, 'H:i:s') }}</td>
                        @if($key->status == 'pending')
                            <td><span class="status text-warning">&bull;</span> Pending</td>
                        @elseif($key->status == 'shipped')
                            <td><span class="status text-success">&bull;</span> Shipped</td>
                        @endif
                        <td>{{  number_format(((float) preg_replace('/[.,]/', '', $key->total))/100,0,",",".") }} VNĐ</td>
                        <td><a href="/detailbill/{{ $key->id }}" class="view" title="Xem chi tiết" data-toggle="tooltip"><i class="material-icons">&#xE5C8;</i></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="clearfix">
                <div class="hint-text">Xem <b>{{ $page }}</b> trong số  <b>{{ $count }}</b> đơn hàng</div>
                <ul class="pagination">
                    @if($bill->currentPage() != 1)
                        <li class="page-item"><a href="{{ str_replace('/?','/',$bill->url($bill->currentPage() - 1)) }}">Trước</a></li>
                    @endif
                    @for($i = 1; $i <= $bill->lastPage(); $i++ )
                        <li class="page-item {{ ($bill->currentPage() ==$i) ? 'active' : ''  }}"><a href="{{ str_replace('/?','/',$bill->url($i)) }}" class="page-link">{{ $i }}</a></li>
                    @endfor
                    @if($bill->currentPage() != $bill->lastPage())
                        <li class="page-item"><a href="{{ str_replace('/?','/',$bill->url($bill->currentPage() + 1)) }}" class="page-link">Tiếp</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <link rel="stylesheet" type="text/css" href="/css/admin/bill.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@endsection
{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
    {{--<meta charset="utf-8">--}}
    {{--<meta http-equiv="X-UA-Compatible" content="IE=edge">--}}
    {{--<meta name="viewport" content="width=device-width, initial-scale=1">--}}
    {{--<title>Quản lí đơn đặt hàng</title>--}}
    {{--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">--}}
    {{--<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">--}}
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">--}}
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}
   {{----}}
    {{----}}
{{--</head>--}}
{{--<body>--}}


{{--</body>--}}
{{--</html>--}}