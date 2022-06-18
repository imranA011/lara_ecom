<div id="hero">
    <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">

        @foreach ( $sliders as $slider)
        <div class="item" style="background-image: url({{ asset('uploads/sliders').'/'.$slider->slider_image }});">
            <div class="container-fluid">
                <div class="caption bg-color vertical-center text-left">
                    <div class="slider-header fadeInDown-1">{{ ucfirst($slider->sub_title) }}</div>
                    <div class="big-text fadeInDown-1"> {{ Str::upper($slider->title) }}</div>
                    <div class="excerpt fadeInDown-2 hidden-xs"> <span>{{ $slider->description }}</span> </div>
                    <div class="button-holder fadeInDown-3"> <a
                            href="{{route('page.shop')}}"
                            class="btn-lg btn btn-uppercase btn-primary shop-now-button"> {{ Str::upper($slider->slider_btn) }}</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        
    </div>
</div>
