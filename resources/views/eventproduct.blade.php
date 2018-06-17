@extends('master')
@section('content')
        <div class="container">
            <div class="col-md-12">
                <div class="box">
                    @foreach($event as $key)
                    <h1>{{ $key->description }}</h1>
                        @endforeach
                </div>

                <div class="box info-bar">
                    <div class="row">
                        <div class="col-sm-12 col-md-4 products-showing">
                            Showing <strong>12</strong> of <strong>25</strong> products
                        </div>

                        <div class="col-sm-12 col-md-8  products-number-sort">
                            <div class="row">
                                <form class="form-inline">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="products-number">
                                            <strong>Show</strong> <a href="#"
                                                                     class="btn btn-default btn-sm btn-primary">12</a>
                                            <a href="#" class="btn btn-default btn-sm">24</a> <a href="#"
                                                                                                 class="btn btn-default btn-sm">All</a>
                                            products
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="products-sort-by">
                                            <strong>Sort by</strong>
                                            <select name="sort-by" class="form-control">
                                                <option>Price</option>
                                                <option>Name</option>
                                                <option>Sales first</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row products">
                    @foreach($product as $pro)
                    <div class="col-md-3 col-sm-4">
                        <div class="product">
                            <div class="flip-container">
                                <div class="flipper">
                                    <div class="front">
                                        <a href="/product/{{ $pro->id  }}">
                                            <img src="{{ $pro->imagefront  }}" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="back">
                                        <a href="/product/{{ $pro->id  }}">
                                            <img src="{{  $pro->imageback }}" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <a href="/product/{{ $pro->id  }}" class="invisible">
                                <img src="/img/product2.jpg" alt="" class="img-responsive">
                            </a>
                            <div class="text">
                                <h3 id="b" class=""><a  href="/product/{{ $pro->id  }}">{{ $pro->name  }}</a></h3>
                                @if($pro->saleup != null)
                                    <p class="price"><del>{{ number_format($pro->price,0,",",".")  }}</del> {{ number_format($pro->price*$pro->saleup ,0,",",".")  }} VNĐ</p>
                                @else
                                    <p class="price">{{ number_format($pro->price,0,",",".")  }} VNĐ</p>
                                @endif
                                <p class="buttons">
                                    <a href="/product/{{ $pro->id  }}" class="btn btn-default">Chi tiết</a>
                                    <a id="{{ $pro->id  }}" class="btn btn-primary add "><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>
                                </p>
                            </div>
                            <!-- /.text -->
                            @if($pro->event_code != null)
                                <div class="ribbon sale">
                                    <div class="theribbon">SALE</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <!-- /.ribbon -->
                        @endif
                        {{--<div class="ribbon new">--}}
                        {{--<div class="theribbon">NEW</div>--}}
                        {{--<div class="ribbon-background"></div>--}}
                        {{--</div>--}}
                        <!-- /.ribbon -->
                        {{--<div class="ribbon gift">--}}
                        {{--<div class="theribbon">GIFT</div>--}}
                        {{--<div class="ribbon-background"></div>--}}
                        {{--</div>--}}
                        <!-- /.ribbon -->
                        </div>
                        <!-- /.product -->
                    </div>
                    @endforeach
                </div>
                <!-- /.products -->

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

        </div>



@endsection

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









