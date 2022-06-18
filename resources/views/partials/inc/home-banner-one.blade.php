<div class="wide-banners wow fadeInUp outer-bottom-xs">
    <div class="row">
    {{-- @php
        $banner = App\Models\Banner::where('status', 'active')->where('banner_type', 'half')->latest()->first();
    @endphp --}}

    @foreach ($banners as $banner)
    @if ($banner->banner_type == 'half' && $banner->status == 'active')
        <div class="col-md-6 col-sm-6">
            <div class="wide-banner cnt-strip">
                    <div class="image">
                        <img  style="width:720px; min-width:300px; height:200px" class="img-responsive" src="{{ asset('uploads/banners').'/'.$banner->banner_image }}" alt="">
                    </div>
            </div>
        </div>
    @endif
    @endforeach

    </div>
</div>
