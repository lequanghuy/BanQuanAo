<div id="top">
    <div class="container">
        <div class="col-md-6 offer" data-animate="fadeInDown">
            <a href="#" class="btn btn-success btn-sm" data-animate-hover="shake">Sự kiện mới</a>  <a href="#">Giảm giá 50% sản phẩm</a>

        </div>
        <div class="col-md-6" data-animate="fadeInDown">
            <ul class="menu">
                @if(Auth::check())
                    <li><a href="#"> {{ strtoupper(auth()->user()->name) }}</a></li>
                    <li><a href="/user/logout">ĐĂNG XUẤT</a></li>
                    @else
                    <li><a href="#" data-toggle="modal" data-target="#login-modal">ĐĂNG NHẬP</a>
                    </li>
                    <li><a href="/dang-ki">ĐĂNG KÍ</a></li>
                    @endif

            </ul>
        </div>
    </div>
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
        <div class="modal-dialog modal-sm">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="Login">Customer login</h4>
                </div>
                <div class="modal-body">
                  <!-- Login Form -->
                    <form action="{{ route('login') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" class="form-control" id="email-modal" placeholder="email" name="email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password-modal" placeholder="password" name="password">
                        </div>

                        <p class="text-center">
                            <button class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                        </p>

                    </form>

                    <p class="text-center text-muted">Chưa có tài khoản?</p>
                    <p class="text-center text-muted"><a href="/register"><strong>ĐĂNG KÍ NGAY</strong></a>! It is easy and done in 1&nbsp;minute and gives you access to special discounts and much more!</p>

                </div>
            </div>
        </div>
    </div>

</div>
