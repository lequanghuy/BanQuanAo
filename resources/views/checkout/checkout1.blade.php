@extends('master')
@section('content')
        <div class="container">
            <div class="col-md-9" id="checkout">

                <div class="box">
                    <form method="POST" action="/bill">
                        {{ csrf_field() }}
                        <h1>Checkout</h1>
                        <ul class="nav nav-pills nav-justified">
                            <li class="active"><a href="#"><i class="fa fa-map-marker"></i><br>Địa chỉ</a>
                            </li>
                        </ul>
                        <div class="content">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="company">Địa chỉ nhà</label>
                                        <input name="address" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="street">Đường</label>
                                        <input name="road" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="company">Quận</label>
                                        <input name="district" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="street">Thành Phố</label>
                                        <input name="city" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="phone">Điện Thoại</label>
                                        <input name="telephone" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input name="email" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="nav nav-pills nav-justified">
                            <li class="active"><a href="#"><i class="fa fa-truck"></i><br>Cách chuyển hàng</a>
                            </li>
                        </ul>
                        <div class="content">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="box shipping-method">

                                        <h4>Chuyển hàng trong 2 tiếng nữa</h4>

                                        <p>Đây là cách chuyển hàng nhanh nhất</p>

                                        <div class="box-footer text-center">
                                            <input type="radio" name="delivery" value="7200">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="box shipping-method">

                                        <h4>Chuyển hàng trong 1 phút nữa</h4>

                                        <p>Chuyển hàng test</p>

                                        <div class="box-footer text-center">
                                            <input type="radio" name="delivery" value="60">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="box-footer">
                            <div class="pull-left">
                                <a href="basket.html" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back to basket</a>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary">Order<i class="fa fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.box -->


            </div>
            <!-- /.col-md-9 -->

            <div class="col-md-3">

                <div class="box" id="order-summary">
                    <div class="box-header">
                        <h3>Order summary</h3>
                    </div>
                    <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td>Order subtotal</td>
                                <th>$446.00</th>
                            </tr>
                            <tr>
                                <td>Shipping and handling</td>
                                <th>$10.00</th>
                            </tr>
                            <tr>
                                <td>Tax</td>
                                <th>$0.00</th>
                            </tr>
                            <tr class="total">
                                <td>Total</td>
                                <th>$456.00</th>
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
