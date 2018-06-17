@extends('master')


@section('content')
        <div class="container">


            <div class="col-md-9">

                <div class="box">
                    <h1>{{ title_case($details)  }}</h1>
                </div>

                @include('product.inforbar')
                <div class="row products">
                @foreach($product as $pro)
                @include('product.product')
                @endforeach()
                </div>

                <div class="pages">

                    <p class="loadMore">
                        <a href="#" class="btn btn-primary btn-lg"><i class="fa fa-chevron-down"></i> Load more</a>
                    </p>

                    <ul class="pagination">
                        <li><a href="#">&laquo;</a>
                        </li>
                        <li class="active"><a href="#">1</a>
                        </li>
                        <li><a href="#">2</a>
                        </li>
                        <li><a href="#">3</a>
                        </li>
                        <li><a href="#">4</a>
                        </li>
                        <li><a href="#">5</a>
                        </li>
                        <li><a href="#">&raquo;</a>
                        </li>
                    </ul>
                </div>


            </div>
            <!-- /.col-md-9 -->

            <div class="col-md-3">

                @include('product.catergoriessidebar')

                @include('product.brands')

                <div class="banner">
                    <a href="#">
                        <img src="/img/banner.jpg" alt="sales 2014" class="img-responsive">
                    </a>
                </div>
            </div>

        </div>

@endsection

@section('javascript')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.add').click(function(){
            var id = $(this).attr('id');
                $.ajax({
                    url: '/buy/' + id,
                    type: 'GET',
                    data: {"product": id},
                    success:function(){
                        alert('Them thanh cong');
                    }


                })
            });
        });

    </script>
@endsection
