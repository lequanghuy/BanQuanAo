@extends('master')
@section('content')
    <div class="container">
        <div class="col-sm-12">
            <ul class="breadcrumb">

                <li><a href="/home">Trang chủ</a>
                </li>
                <li><a href="/blog">Tin tức</a>
                </li>
                <li>{{ $post->title }}</li>
            </ul>
        </div>

        <div class="col-sm-9" id="blog-post">
            <div class="box">
                    <h1>{{ $post->title }}</h1>
                    <p class="author-date">Viết bởi <a href="#">John Slim</a> | {{ $post->created_at->toFormattedDateString() }}</p>
                    <div id="post-content">
                        {!! $post->body !!}
                    </div>
                <div id="comments" data-animate="fadeInUp">
                    <h4>{{ $post->comments->count() }} bình luận</h4>
                    @foreach($post->comments as $comment)
                    <div class="row comment">
                        <div class="col-sm-3 col-md-2 text-center-xs">
                            <p>
                                <img src="/img/blog-avatar2.jpg" class="img-responsive img-circle" alt="">
                            </p>
                        </div>
                        <div class="col-sm-9 col-md-10">
                            <h5>{{ $comment->user->name }}</h5>
                            <p class="posted"><i class="fa fa-clock-o"></i>{{ $comment->created_at->toDayDateTimeString() }}</p>
                            <p>{{ $comment->comment }}</p>
                            {{--<p class="reply"><a href="#"><i class="fa fa-reply"></i> Reply</a>--}}
                            {{--</p>--}}
                        </div>
                    </div>
                        @endforeach
                </div>
                <!-- /#comments -->

                <div id="comment-form" data-animate="fadeInUp">
                    <h4>Để lại bình luận</h4>
                    <form action="/addcomment/{{ $post->id }}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="comment">Bình luận <span class="required">*</span>
                                    </label>
                                    <textarea class="form-control" name="comment" rows="4"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 text-right">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-comment-o"></i> Đăng</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /#comment-form -->

            </div>
            <!-- /.box -->
        </div>
        <!-- /#blog-post -->

        <div class="col-md-3">
            <!-- *** BLOG MENU ***
_________________________________________________________ -->
            <div class="panel panel-default sidebar-menu">

                <div class="panel-heading">
                    <h3 class="panel-title">Blog</h3>
                </div>

                <div class="panel-body">

                    <ul class="nav nav-pills nav-stacked">
                        <li>
                            <a href="blog.html">About us</a>
                        </li>
                        <li class="active">
                            <a href="blog.html">Fashion</a>
                        </li>
                        <li>
                            <a href="blog.html">News and gossip</a>
                        </li>
                        <li>
                            <a href="blog.html">Design</a>
                        </li>
                    </ul>
                </div>

            </div>
            <!-- /.col-md-3 -->

            <!-- *** BLOG MENU END *** -->

            <div class="banner">
                <a href="#">
                    <img src="/img/banner.jpg" alt="sales 2014" class="img-responsive">
                </a>
            </div>
        </div>


    </div>
@endsection





