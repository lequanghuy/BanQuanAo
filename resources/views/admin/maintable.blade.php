@extends('admin.crudproduct')

@section('content1')
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
            </th>
            <th>Trạng thái sự kiện</th>
            <th>Tên sản phẩm</th>
            <th>Hãng sản xuất</th>
            <th>Ảnh đại diện</th>
            <th>Giá sản phẩm</th>
            <th>Ngày sửa</th>
            <th>Thao tác</th>
        </tr>
        </thead>
        <tbody>
        @foreach($product as $pro )
            <tr class="records" id="{{ $pro->id }}">
                <td>
							<span class="custom-checkbox">
								<input class="select" type="checkbox" name="{{ $pro->id }}">
								<label for=""></label>
							</span>
                </td>
                @if($pro->event_code != null)
                    <td><span class="status text-success">&bull;</span> Đang sự kiện</td>
                @else
                    <td><span class="status text-danger">&bull;</span> Ko có sự kiện</td>
                @endif
                <td>{{ $pro->name }}</td>
                <td>{{ $pro->brands }}</td>
                <td><img src="{{ $pro->mainsquare }}" width="45" height="45"></td>
                <td>{{ number_format($pro->price,0,",",".") }} VNĐ</td>
                <td>{{ substr($pro->updated_at, 0, -9) }}</td>
                <td>
                    <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons"
                                                                                     data-toggle="tooltip" title="Sửa">&#xE254;</i></a>
                    <a href="/delete/{{ $pro->id }}" class="delete" data-toggle="modal"><i class="material-icons"
                                                                                           data-toggle="tooltip"
                                                                                           title="Xóa">&#xE872;</i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="clearfix">
        <div class="hint-text">Hiện <b>{{ $page }}</b> sản phẩm trong số <b>{{ $count }}</b> sản phẩm</div>
        <ul class="pagination">
            @if($product->currentPage() != 1)
                <li class="page-item"><a href="{{ str_replace('/?','/',$product->url($product->currentPage() - 1)) }}">Trước</a>
                </li>
            @endif
            @for($i = 1; $i <= $product->lastPage(); $i++ )
                <li class="page-item {{ ($product->currentPage() ==$i) ? 'active' : ''  }}"><a
                            href="{{ str_replace('/?','/',$product->url($i)) }}" class="page-link">{{ $i }}</a></li>
            @endfor
            @if($product->currentPage() != $product->lastPage())
                <li class="page-item"><a href="{{ str_replace('/?','/',$product->url($product->currentPage() + 1)) }}"
                                         class="page-link">Tiếp</a></li>
            @endif
        </ul>
    </div>

@endsection