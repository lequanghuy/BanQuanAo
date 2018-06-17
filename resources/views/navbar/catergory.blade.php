<li class="dropdown yamm-fw">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">{{ $cat->name  }} <b class="caret"></b></a>
    <ul class="dropdown-menu">
        <li>
            <div class="yamm-content">
                <div class="row">
                    <div class="col-sm-6">
                        <h5>Clothing</h5>
                        <ul>
                            @foreach($cat->catergorydetailsclothes as $clothes)
                                <li><a href="/product/?clothescode={{ $clothes->code  }}&a={{ $clothes->description }}">{{  $clothes->description }}</a>
                                </li>
                            @endforeach


                        </ul>
                    </div>
                    <div class="col-sm-6">
                        <h5>Shoes</h5>
                        <ul>
                            @foreach($cat->catergorydetailsshoes as $shoes)
                                <li><a href="/product/?shoescode={{ $shoes->code  }}&a={{ $shoes->description  }}">{{ $shoes->description  }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /.yamm-content -->
        </li>
    </ul>
</li>