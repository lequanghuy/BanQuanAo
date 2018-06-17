<!DOCTYPE html>
<html>
<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="/js/admin/role.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/admin/role.css">
    <title>Tạo quyền</title>
    <style type="text/css">
        .title {
            margin-bottom: 70px;
            color: darkblue;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="title">
        <h1><a href="/admin/employee">Quản lí nhân sự</a> / Tạo mới <strong>Quyền</strong></h1>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form action="/admin/createrole" method="POST">
                {{ csrf_field() }}
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Tiêu đề (Role)</label>
                        <input name="title" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"
                                                                        aria-hidden="true"></span> Tạo
                    </button>
                </div>
            </form>
            <form action="/admin/createpermission" method="POST">
                {{ csrf_field() }}
                <div class="col-md-12" style="margin-top: 20px">
                    <div class="form-group">
                        <label>Tiêu đề loại quyền (Permissions)</label>
                        <input name="title1" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Tên loại quyền</label>
                        <input name="name" class="form-control" placeholder="view-abc">
                    </div>
                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"
                                                                        aria-hidden="true"></span> Tạo
                    </button>
                </div>
            </form>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Chọn quyền</label>
                <select name="role" class="form-control role">
                    <option value="0">Chọn...</option>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Permissions</label>
                <div class="row permission">
                    @foreach($permissions as $permission)
                        <div class="col-md-6">
                            <label class="container1">{{ $permission->title }}
                                <input id="{{ $permission->id }}" class="checkbox{{ $permission->id }}" type="checkbox"
                                       name="{{ $permission->title }}">
                                <span class="checkmark"></span>
                            </label>

                        </div>
                    @endforeach

                </div>
                <div class="plus" style="display: none;">
                    <button class="save btn btn-info">Lưu thay đổi</button>
                </div>
            </div>
        </div>
    </div>
    <div class="thongbao" style="margin-top: 20px">
        @if($flash = session('message'))
            <div class="a1 alert alert-success" role="alert">
                {{ $flash }}
            </div>
        @endif
    </div>
</div>
</body>
</html>
