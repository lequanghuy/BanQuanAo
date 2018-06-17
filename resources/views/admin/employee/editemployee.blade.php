<!DOCTYPE HTML>
<html>
<head>
    <title>Edit shit</title>
</head>

<body>
<div class="content">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="/admin/editemployee/{{ $edit->id }}">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h4 class="modal-title">Sửa thông tin</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Họ và tên</label>
                        <input type="text" name="name1" class="form-control" required value="{{ $edit->name }}">
                    </div>
                    <div class="form-group">
                        <label>Tên hiển thị</label>
                        <input type="text" name="nickname1" class="form-control" required value="{{ $edit->nickname }}">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email1" required disabled>
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input type="text" class="form-control" name="password1" required disabled>
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input type="text" class="form-control" name="telephone1" required value="{{ $edit->telephone }}" >
                    </div>
                    <div class="form-group">
                        <label>Phân quyền</label>
                        <select name="role_id1" class="form-control">
                            <option value="{{ $edit->role_id }}">{{ $edit->role->title }}</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Thoát">
                    <input type="submit" class="btn btn-success" value="Lưu">
                </div>
            </form>
        </div>
    </div>
</div>


</body>

</html>

