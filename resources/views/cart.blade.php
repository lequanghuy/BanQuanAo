@extends('master')
@section('content')
        <div class="container">

            <div class="col-md-9" id="basket">
                @if($flash = session('message'))
                <div class="alert alert-success" role="alert">
                    {{ $flash }}
                </div>
                @endif
                <div class="box">

                    <form method="POST" action="">

                        <h1>Giỏ hàng của bạn</h1>
                        <p class="text-muted">Hiện tại có {{ $count }} sản phẩm trong giỏ hàng.</p>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th colspan="2">Sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Giá gốc</th>
                                    <th>Giảm giá</th>
                                    <th colspan="2">Tổng tiền</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <input name="_token" type="hidden" value="{{  csrf_token() }}"/>
                                @foreach($content as $cart)
                                <tr id="item{{ $cart->rowId }}">
                                    <td>
                                        <a href="#">
                                            <img src="{{ $cart->options->img }}" alt="White Blouse Armani">
                                        </a>
                                    </td>
                                    <td><a href="#">{{ $cart->name  }}</a>
                                    </td>
                                    <td>
                                        <input type="text" value="{{ $cart->qty }}" class="form-control qty{{ $cart->rowId }}">
                                    </td>
                                    @if($cart->options->saleup != null)
                                        <td>{{  number_format($cart->price/(1 - $cart->options->saleup),0,",",".")  }}</td>
                                    @else
                                        <td>{{  number_format($cart->price,0,",",".")  }}</td>
                                    @endif

                                    @if($cart->options->saleup != null)
                                    <td>{{ $cart->options->saleup*100 }}%</td>
                                        @else
                                        <td>0</td>
                                    @endif
                                    @if($cart->options->saleup != null)
                                    <td>{{  number_format(($cart->price)*($cart->qty),0,",",".")  }}</td>
                                    @else
                                        <td>{{  number_format(($cart->price)*($cart->qty),0,",",".")  }}</td>

                                    @endif
                                        <td><a class="updatecart" id="{{  $cart->rowId }}" href="#"><i class="fa fa-refresh"></i></a><a class="remove" id="{{  $cart->rowId }}" href="#"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                <tr>
                                    @endforeach
                                    <th colspan="5">Tổng tiền</th>
                                    <th colspan="2" id="a">{{ number_format(((float) preg_replace('/[.,]/', '', $total))/100,0,",",".") }}</th>
                                </tr>
                                </tbody>
                                </tfoot>
                            </table>

                        </div>
                        <!-- /.table-responsive -->
                    </form>
                    <div class="box-footer">
                        <div class="pull-left">
                            <a class="btn btn-default continue"><i class="fa fa-chevron-left"></i> Continue shopping</a>
                        </div>
                        <div class="pull-right">
                                <a href="/checkout1" class="btn btn-primary">Tiếp tục<i class="fa fa-chevron-right"></i></a>
                        </div>
                    </div>

                </div>
                <!-- /.box -->


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
                                <img src="img/product3.jpg" alt="" class="img-responsive">
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

            <div class="col-md-3">
                <div class="box" id="order-summary">
                    <div class="box-header">
                        <h3>Tóm tắt</h3>
                    </div>
                    <p class="text-muted">Tiền ship bao gồm dựa vào địa điểm của bạn.</p>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td>Tiền ship</td>
                                <th>Ấn vào "Tiếp tục"để thanh toán</th>
                            </tr>
                            <tr>
                                <td>Thuế</td>
                                <th>0 VNĐ</th>
                            </tr>
                            <tr class="total">
                                <td>Total</td>
                                <th>{{ number_format(((float) preg_replace('/[.,]/', '', $total))/100,0,",",".") }} VNĐ</th>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.col-md-3 -->

        </div>
        <!-- /.container -->

@endsection

@section('javascript')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.remove').click(function(){
                var rowid = $(this).attr('id');

                $.ajax({
                    url: '/removecartitem/'+rowid,
                    type: 'GET',
                    data: {"rowid": rowid},
                    success:function(){
                         $("#item"+rowid).remove();
                    }


                })
            });
        });

        $(document).ready(function() {
            $('.updatecart').click(function(){
                var rowid = $(this).attr('id');
                var qty = $(".qty"+rowid).val();
                var token = $("input[name='_token' ]").val();
                $.ajax({
                    url: '/updatecart/'+rowid+'/'+qty,
                    type: 'GET',
                    data: {"id": rowid,"qty": qty, '_token': token},
                    success:function(){
                            alert('cap nhat thanh cong');
                            window.location = '/cart';
                    }


                })
            });
        });

        $(document).ready(function() {
            $('.continue').click(function() {
                history.go(-1);
            });
        });
    </script>
@endsection
