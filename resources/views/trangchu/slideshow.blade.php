<div class="container">
    <div class="col-md-12">
        <div id="main-slider">
            @if(!empty($event))
            @foreach($event as $key)
                <div class="item">
                    <a href="/event/{{ $key->code}}">
                        <img src="/img/event/{{ $key->banner }}" alt="" class="img-responsive">
                    </a>
                </div>
            @endforeach
            @else
            <div class="item">
                <img src="/img/main-slider1.jpg" alt="" class="img-responsive">
            </div>
            <div class="item">
                <img class="img-responsive" src="/img/main-slider2.jpg" alt="">
            </div>
            <div class="item">
                <img class="img-responsive" src="/img/main-slider3.jpg" alt="">
            </div>
            <div class="item">
                <img class="img-responsive" src="/img/main-slider4.jpg" alt="">
            </div>
            @endif
        </div>
        <!-- /#main-slider -->
    </div>
</div>
