@extends('admin.customer.customer')
@section('content1')
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>Tên</th>
            <th style="width: 20%;">Email</th>
            <th>Ngày tạo</th>
            <th>Số lần đặt hàng</th>
            <th style="width: 20%;">Xem order</th>
        </tr>
        </thead>
        <tbody>
        @foreach($user as $key)
            <tr id="{{ $key->id }}">
                <td>{{ $key->name }}</td>
                <td>{{ $key->email }}</td>
                <th>{{ date_format($key->created_at, 'd/m/Y') }}</th>
                <th>{{ $key->bill->count() }}</th>
                <td>
                    <a href="#editEmployeeModal" class="order" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Xem">&#xE254;</i></a>
                    {{--<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>--}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection