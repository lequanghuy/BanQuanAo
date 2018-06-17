<!DOCTYPE HTML>
<html>
<head>
    <title>Edit shit</title>
</head>

<body>
<div class="content">
<div class="modal-dialog modal-lg editform">
    <div class="modal-content">
        <form method="POST" action="/submitedit/{{ $edit->id }}">

            <input name="_token" type="hidden" value="{{  csrf_token() }}"/>
            <div class="modal-header">
                <h4 class="modal-title">SỬA SẢN PHẨM</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Sản Phẩm Dành Cho</label>
                    <select name="sl4" class="form-control sl4">

                        <option value="{{ $c[0]['name'] }}">{{ $c[0]['name'] }}</option>
                        @foreach($catergory as $cat)
                            <option value="{{ $cat->id  }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Thể Loại</label>
                    <select name="sl5" class="form-control sl5">
                        <option value="{{ $theloai }}">{{ $theloai }}</option>
                        <option value="Quần áo">Quần áo</option>
                        <option value="Giầy">Giầy</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Chi Tiết Thể Loại</label>
                    <select id="{{ $detail[0]['code'] }}" name="catergorydetails_code1" class="form-control sl6">
                           {{ $detail[0]['description']  }}
                    </select>
                </div>
                <div class="form-group">
                    <label>Tên Sản Phẩm</label>
                    <input name="name1" type="text" class="form-control" value="{{ $edit->name }}">
                </div>

                <div class="form-group">
                    <label>Giá sản phẩm</label>
                    <input name="price1" type="text" class="form-control" value="{{ $edit->price }}">
                </div>
                <div class="form-group">
                    <label>Ảnh đại diện (Mặt trước)</label>
                    <div class="input-group input-file" name="imagefront1">
                        <input name="imagefront1" type="text" class="form-control" placeholder='Chọn ảnh...' value="{{ $edit->imagefront }}" />
                        <span class="input-group-btn">
        		                <button class="btn btn-primary btn-choose" type="button">Choose</button>
    		                </span>
                    </div>
                </div>
                <div class="form-group">
                    <label>Ảnh đại diện (Mặt sau)</label>
                    <div class="input-group input-file" name="imageback1">
                        <input name="imageback1" type="text" class="form-control" placeholder='Chọn ảnh...' value="{{ $edit->imageback }}" />
                        <span class="input-group-btn">
        		                <button class="btn btn-primary btn-choose" type="button">Choose</button>
    		                </span>
                    </div>
                </div>
                <div class="form-group">
                    <label>Ảnh chi tiết 1</label>
                    <div class="input-group input-file" name="mainimage1">
                        <input name="mainimage1" type="text" class="form-control" placeholder='Chọn ảnh...' value="{{ $edit->mainimage }}" />
                        <span class="input-group-btn">
        		                <button class="btn btn-primary btn-choose" type="button">Choose</button>
    		                </span>
                    </div>
                </div>
                <div class="form-group">
                    <label>Ảnh phụ chi tiết 1</label>
                    <div class="input-group input-file" name="mainsquare1">
                        <input name="mainsquare1" type="text" class="form-control" placeholder='Chọn ảnh...' value="{{ $edit->mainsquare }}" />
                        <span class="input-group-btn">
        		                <button class="btn btn-primary btn-choose" type="button">Choose</button>
    		                </span>
                    </div>
                </div>
                <div class="form-group">
                    <label>Ảnh chi tiết 2</label>
                    <div class="input-group input-file" name="detailimagetwo1">
                        <input name="detailimagetwo1" type="text" class="form-control" placeholder='Chọn ảnh...' value="{{ $edit->detailimagetwo }}" />
                        <span class="input-group-btn">
        		                <button class="btn btn-primary btn-choose" type="button">Choose</button>
    		                </span>
                    </div>
                </div>
                <div class="form-group">
                    <label>Ảnh phụ chi tiết 2</label>
                    <div class="input-group input-file" name="detailsquaretwo1">
                        <input name="detailsquaretwo1" type="text" class="form-control" placeholder='Chọn ảnh...' value="{{ $edit->detailsquaretwo }}" />
                        <span class="input-group-btn">
        		                <button class="btn btn-primary btn-choose" type="button">Choose</button>
    		                </span>
                    </div>
                </div>
                <div class="form-group">
                    <label>Ảnh chi tiết 3</label>
                    <div class="input-group input-file" name="detailimagethree1">
                        <input name="detailimagethree1" type="text" class="form-control" placeholder='Chọn ảnh...' value="{{ $edit->detailimagethree }}" />
                        <span class="input-group-btn">
        		                <button class="btn btn-primary btn-choose" type="button">Choose</button>
    		                </span>
                    </div>
                </div>
                <div class="form-group">
                    <label>Ảnh phụ chi tiết 3</label>
                    <div class="input-group input-file" name="detailsquarethree1">
                        <input name="detailsquarethree1" type="text" class="form-control" placeholder='Chọn ảnh...' value="{{ $edit->detailsquarethree }}" />
                        <span class="input-group-btn">
        		                <button class="btn btn-primary btn-choose" type="button">Choose</button>
    		                </span>
                    </div>
                </div>
                <div class="form-group">
                    <label>Chi tiết sản phẩm</label>
                    <input name="detail1" type="text" class="form-control" value="{{ $edit->detail }}">
                </div>
                <div class="form-group">
                    <label>Chất liệu</label>
                    <input name="material1" type="text" class="form-control" value="{{ $edit->material }}">
                </div>
                <div class="form-group">
                    <label>Cách bảo quản</label>
                    <input name="care1" type="text" class="form-control" value="{{ $edit->care }}">
                </div>
                <div class="form-group">
                    <label>Size</label>
                    <input name="size1" type="text" class="form-control" value="{{ $edit->size }}">
                </div>
                <div class="form-group">
                    <label>Fit</label>
                    <input name="fit1" type="text" class="form-control" value="{{ $edit->fit }}">
                </div>
                <div class="form-group">
                    <label>Khuyên dùng</label>
                    <textarea name="advice1" class="form-control">{{ $edit->advice }}</textarea>
                </div>
                <div class="form-group">
                    <label>Nhãn hiệu</label>
                    <input name="brands1" type="text" class="form-control" value="{{ $edit->brands }}">
                </div>
                <div class="form-group">
                    <label>Sự kiện đi kèm</label>
                    <select name="event_code1" class="form-control">
                        <option value="{{ $edit->event_code }}">{{ $edit->event_code }}</option>
                        <option>Giảm giá</option>
                        <option>Mua 1 tặng 1</option>
                    </select>
                </div>

            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Thoát">
                <input type="submit" class="btn btn-info" value="Cập nhật">
            </div>
        </form>
    </div>
</div>
</div>


</body>

</html>

