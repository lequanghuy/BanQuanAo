@extends('master')
@section('content')
    <div class="container">

        <!-- *** LEFT COLUMN ***
     _________________________________________________________ -->

        <div class="col-sm-9" id="blog-listing">

            <ul class="breadcrumb">

                <li><a href="/home">Trang chủ</a>
                </li>
                <li>Tin tức</li>
            </ul>
            @foreach($posts as $post)
            <div class="post">
                <h2><a href="/post/{{ $post->id }}/{{ $post->slug }}">{{ $post->title }}</a></h2>
                <p class="author-category">By <a href="#">John Slim</a> in <a href="">Fashion and style</a>
                </p>
                <hr>
                <p class="date-comments">
                    <a><i class="fa fa-calendar-o"></i>{{ $post->created_at->toFormattedDateString() }}</a>
                    <a><i class="fa fa-comment-o"></i> {{ $post->comments->count() }} Bình luận</a>
                </p>
                <div class="image">
                    <a href="post.html">
                        <img src="img/blog/{{ $post->image }}" height="415" width="1000" class="img-responsive" alt="Example blog post alt">
                    </a>
                </div>
                <p class="intro">{{substr(strip_tags($post->body), 0, 250)}}{{ strlen(strip_tags($post->body)) > 250 ? "..." : "" }}</p>
                <p class="read-more"><a href="/post/{{ $post->id }}/{{ $post->slug }}" class="btn btn-primary">Đọc tiếp</a>
                </p>
            </div>
            @endforeach
            <ul class="pager">
                <li class="previous"><a href="#">&larr; Older</a>
                </li>
                <li class="next disabled"><a href="#">Newer &rarr;</a>
                </li>
            </ul>


        </div>
        <!-- /.col-md-9 -->

        <!-- *** LEFT COLUMN END *** -->


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
                    <img src="img/banner.jpg" alt="sales 2014" class="img-responsive">
                </a>
            </div>
        </div>


    </div>
@endsection
