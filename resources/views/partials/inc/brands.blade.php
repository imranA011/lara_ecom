<div id="brands-carousel" class="logo-slider wow fadeInUp">
    <div class="logo-slider-inner">
        <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
            <div class="item m-t-15"> <a href="#" class="image">
                <img data-echo="{{asset('frontend/assets/images/brands/brand1.png')}}" src="{{ asset('frontend/assets/images/ogo.pngl')}}" alt=""> </a>
            </div>

            @foreach ($brands as $brand)

            <div class="item m-t-10">
                <a href="#" class="image">
                    <img src="{{ asset('frontend/assets/images/logo.png')}}" alt="">
                </a>
                <p>{{ $brand->brand_name}}</p>
            </div>
            <!--/.item-->
            @endforeach

        </div>
    </div>
</div>
