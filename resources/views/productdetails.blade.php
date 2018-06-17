
@extends('master')
@section('content')
        <div class="container">
            <div class="col-md-3">
                <!-- *** MENUS AND FILTERS ***
_________________________________________________________ -->
                <div class="panel panel-default sidebar-menu">

                    <div class="panel-heading">
                        <h3 class="panel-title">Categories</h3>
                    </div>

                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked category-menu">
                            <li>
                                <a href="category.html">Men <span class="badge pull-right">42</span></a>
                                <ul>
                                    <li><a href="category.html">T-shirts</a>
                                    </li>
                                    <li><a href="category.html">Shirts</a>
                                    </li>
                                    <li><a href="category.html">Pants</a>
                                    </li>
                                    <li><a href="category.html">Accessories</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="active">
                                <a href="category.html">Ladies  <span class="badge pull-right">123</span></a>
                                <ul>
                                    <li><a href="category.html">T-shirts</a>
                                    </li>
                                    <li><a href="category.html">Skirts</a>
                                    </li>
                                    <li><a href="category.html">Pants</a>
                                    </li>
                                    <li><a href="category.html">Accessories</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="category.html">Kids  <span class="badge pull-right">11</span></a>
                                <ul>
                                    <li><a href="category.html">T-shirts</a>
                                    </li>
                                    <li><a href="category.html">Skirts</a>
                                    </li>
                                    <li><a href="category.html">Pants</a>
                                    </li>
                                    <li><a href="category.html">Accessories</a>
                                    </li>
                                </ul>
                            </li>

                        </ul>

                    </div>
                </div>

                <div class="panel panel-default sidebar-menu">

                    <div class="panel-heading">
                        <h3 class="panel-title">Brands <a class="btn btn-xs btn-danger pull-right" href="#"><i class="fa fa-times-circle"></i> Clear</a></h3>
                    </div>

                    <div class="panel-body">

                        <form>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox">Armani (10)
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox">Versace (12)
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox">Carlo Bruni (15)
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox">Jack Honey (14)
                                    </label>
                                </div>
                            </div>

                            <button class="btn btn-default btn-sm btn-primary"><i class="fa fa-pencil"></i> Apply</button>

                        </form>

                    </div>
                </div>

                <div class="banner">
                    <a href="#">
                        <img src="/img/banner.jpg" alt="sales 2014" class="img-responsive">
                    </a>
                </div>
            </div>

            <div class="col-md-9">

                <div class="row" id="productMain">
                    <div class="col-sm-6">
                        <div id="mainImage">
                            <img src="{{  $product->mainimage }}" alt="" class="img-responsive">
                        </div>

                        <div class="ribbon sale">
                            <div class="theribbon">SALE</div>
                            <div class="ribbon-background"></div>
                        </div>
                        <!-- /.ribbon -->

                        <div class="ribbon new">
                            <div class="theribbon">NEW</div>
                            <div class="ribbon-background"></div>
                        </div>
                        <!-- /.ribbon -->

                    </div>
                    <div class="col-sm-6">
                        <div class="box">
                            <h1 class="text-center">{{ $product->name  }}</h1>
                            <p class="goToDescription"><a href="#details" class="scroll-to">Scroll to product details, material & care and sizing</a>
                            </p>
                            @if($product->saleup != null)
                            <p class="price"> {{ number_format($product->price*$product->saleup,0,",",".")  }} VNĐ</p>
                                @else
                                <p class="price"> {{ number_format($product->price,0,",",".") }} VNĐ</p>
                            @endif
                            <p class="text-center buttons">
                                <a id="{{ $product->id  }}" class="btn btn-primary add"><i class="fa fa-chevron-down"></i> Add to cart</a>
                                <a href="basket.html" class="btn btn-default"><i class="fa fa-heart"></i> Add to wishlist</a>
                            </p>


                        </div>

                        <div class="row" id="thumbs">
                            <div class="col-xs-4">
                                <a href="{{  $product->mainimage }}" class="thumb">
                                    <img src="{{  $product->mainsquare }}" alt="" class="img-responsive">
                                </a>
                            </div>
                            <div class="col-xs-4">
                                <a href="{{  $product->detailimagetwo }}" class="thumb">
                                    <img src="{{  $product->detailsquaretwo }}" alt="" class="img-responsive">
                                </a>
                            </div>
                            <div class="col-xs-4">
                                <a href="{{  $product->detailimagethree }}" class="thumb">
                                    <img src="{{  $product->detailsquarethree }}" alt="" class="img-responsive">
                                </a>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="box" id="details">
                    <p>
                    <h4>Product details</h4>
                    <p>{{  $product->detail }}</p>
                    <h4>Material & care</h4>
                    <ul>
                        <li>{{  $product->material }}</li>
                        <li>{{  $product->care }}</li>
                    </ul>
                    <h4>Size & Fit</h4>
                    <ul>
                        <li>{{  $product->fit }}</li>
                        <li>{{  $product->size }}</li>
                    </ul>

                    <blockquote>
                        <p><em>{{  $product->advice }}</em>
                        </p>
                    </blockquote>
                </div>

                <div class="row same-height-row">
                    <div class="col-md-3 col-sm-6">
                        <div class="box same-height">
                            <h3>You may also like these products</h3>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="product same-height">
                            <div class="flip-container">
                                <div class="flipper">
                                    <div class="front">
                                        <a href="detail.html">
                                            <img src="/img/product2.jpg" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="back">
                                        <a href="detail.html">
                                            <img src="/img/product2_2.jpg" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <a href="detail.html" class="invisible">
                                <img src="/img/product2.jpg" alt="" class="img-responsive">
                            </a>
                            <div class="text">
                                <h3>Fur coat</h3>
                                <p class="price">$143</p>
                            </div>
                        </div>
                        <!-- /.product -->
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="product same-height">
                            <div class="flip-container">
                                <div class="flipper">
                                    <div class="front">
                                        <a href="detail.html">
                                            <img src="/img/product1.jpg" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="back">
                                        <a href="detail.html">
                                            <img src="/img/product1_2.jpg" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <a href="detail.html" class="invisible">
                                <img src="/img/product1.jpg" alt="" class="img-responsive">
                            </a>
                            <div class="text">
                                <h3>Fur coat</h3>
                                <p class="price">$143</p>
                            </div>
                        </div>
                        <!-- /.product -->
                    </div>


                    <div class="col-md-3 col-sm-6">
                        <div class="product same-height">
                            <div class="flip-container">
                                <div class="flipper">
                                    <div class="front">
                                        <a href="detail.html">
                                            <img src="/img/product3.jpg" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="back">
                                        <a href="detail.html">
                                            <img src="/img/product3_2.jpg" alt="" class="img-responsive">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <a href="detail.html" class="invisible">
                                <img src="/img/product3.jpg" alt="" class="img-responsive">
                            </a>
                            <div class="text">
                                <h3>Fur coat</h3>
                                <p class="price">$143</p>

                            </div>
                        </div>
                        <!-- /.product -->
                    </div>

                </div>
            </div>
            <!-- /.col-md-9 -->
        </div>
        <!-- /.container -->

@endsection()

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

