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
    <title>Sửa tin tức</title>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({
            selector: 'textarea',
            plugins: 'link code image imagetools'
        });
    </script>
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
        <h1>Sửa <strong>Tin tức</strong></h1>
    </div>
    <form action="/edit" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-12">
                <div class="form-group" style="display: none;">
                    <label>ID</label>
                    <input name="id" class="form-control" value="{{ $post->id }}">
                </div>
                <div class="form-group">
                    <label>Tiêu đề</label>
                    <input name="title1" class="form-control" value="{{ $post->title }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Slug</label>
                    <input name="slug1" type="text" class="form-control" value="{{ $post->slug }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Ảnh đại diện</label>
                    <input name="image1" type="file" id="BSbtninfo" value="">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Viết báo</label>
            <textarea name="body1">{{ $post->body }}</textarea>
        </div>
        <div>
            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"
                                                                aria-hidden="true"></span> Xuất bản
            </button>
            <buton class="btn btn-danger"><span class="glyphicon glyphicon-save" aria-hidden="true"></span> Lưu lại
            </buton>
        </div>
    </form>
</div>

<script type="text/javascript">

</script>
</body>
</html>
