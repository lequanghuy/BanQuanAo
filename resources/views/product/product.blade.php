
    <div class="col-md-4 col-sm-6">
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
                    <a id="{{ $pro->id  }}" class="btn btn-primary add "><i class="fa fa-chevron-down"></i>Thêm giỏ hàng</a>
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

    <!-- /.col-md-4 -->


