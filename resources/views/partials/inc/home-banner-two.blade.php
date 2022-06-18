<div class="wide-banners wow fadeInUp outer-bottom-xs">
    <div class="row">
        @foreach ($banners as $banner)
        @if ($banner->banner_type == 'full' && $banner->status == 'active')
        <div class="col-md-12">
            <div class="wide-banner cnt-strip">
                <div class="image">
                    <img class="img-responsive" src="{{ asset('uploads/banners').'/'.$banner->banner_image }}" alt="">
                </div>
                <div class="strip strip-text">
                    <div class="strip-inner">
                        <h2 class="text-right">{{ $banner->title  }}<br>
                            <span class="shopping-needs">{{ $banner->sub_title  }}</span>
                        </h2>
                    </div>
                </div>
                <div class="new-label">
                    <div class="text">NEW</div>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</div>
