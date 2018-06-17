@extends('admin')
@section('sidebar')
    <li class=""><a href="/admin/employee"><i class="fa fa-users"></i>Nhân sự</a></li>
    <li class=""><a href="/admin/customer"><i class="fa fa-user"></i>Khách hàng</a></li>
    <li class=""><a href="/admin/product"><i class="fa fa-shopping-cart"></i>Sản phẩm</a></li>
    <li class=""><a href="/admin/event"><i class="fa fa-calendar"></i>Sự kiện</a></li>
    <li class=""><a href="/admin/bill"><i class="fa fa-money"></i>Đặt hàng</a></li>
    <li class="active"><a href="/admin/blog"><i class="fa fa-file-o"></i>Viết báo</a></li>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                        <h2>Quản lí <b>Tin Tức</b></h2>
                    </div>
                    <div class="col-sm-7">
                        <a href="/admin/createblog" class="btn btn-primary"><i class="material-icons">&#xE147;</i> <span>Tạo mới tin tức</span></a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Tiêu đề</th>
                    <th>Slug</th>
                    <th>Ảnh đại diện</th>
                    <th>Nội dung</th>
                    <th >Ngày cập nhật</th>
                    <th>Thời gian</th>
                    <th style="width: 13%;">Thao tác</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->slug }}</td>
                        <td><img src="/img/blog/{{ $post->image }}" width="70" height="40" alt=""></td>
                        <td>{{substr(strip_tags($post->body), 0, 20)}}{{ strlen(strip_tags($post->body)) > 20 ? "..." : "" }}</td>
                        <td>{{ date_format($post->updated_at, 'd/m/Y') }}</td>
                        <td>{{ date_format($post->updated_at, 'H:i:s') }}</td>
                        <td>
                            <a href="/post/{{ $post->id }}/{{ $post->slug }}" class="view" title="Xem" data-toggle="tooltip"><i
                                        class="material-icons">&#xE417;</i></a>
                            <a href="/postformedit/{{ $post->id }}" class="edit" title="Sửa" data-toggle="tooltip"><i
                                        class="material-icons">&#xE254;</i></a>
                            <a href="/postdelete/{{ $post->id }}" class="delete" title="Xóa" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="clearfix">
                <div class="hint-text">Hiện <b>{{ $page }}</b> bài viết trong số <b>{{ $count }}</b> bài viết </div>
                <ul class="pagination">
                    @if($posts->currentPage() != 1)
                        <li class="page-item"><a href="{{ str_replace('/?','/',$posts->url($posts->currentPage() - 1)) }}">Trước</a></li>
                    @endif
                    @for($i = 1; $i <= $posts->lastPage(); $i++ )
                        <li class="page-item {{ ($posts->currentPage() ==$i) ? 'active' : ''  }}"><a href="{{ str_replace('/?','/',$posts->url($i)) }}" class="page-link">{{ $i }}</a></li>
                    @endfor
                    @if($posts->currentPage() != $posts->lastPage())
                        <li class="page-item"><a href="{{ str_replace('/?','/',$posts->url($posts->currentPage() + 1)) }}" class="page-link">Tiếp</a></li>
                    @endif
                </ul>
            </div>
        </div>
        @if($flash = session('message'))
            <div class="alert alert-success" role="alert">
                {{ $flash }}
            </div>
        @endif
    </div>
    <link rel="stylesheet" type="text/css" href="/css/admin/blog.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@endsection

@section('javascript')
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
            setTimeout(function(){
                $(".alert").fadeIn().delay(5000).fadeOut('slow');
            });
        });
    </script>
@endsection