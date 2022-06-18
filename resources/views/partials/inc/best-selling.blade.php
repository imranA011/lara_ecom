<div class="best-deal wow fadeInUp outer-bottom-xs">
    <h3 class="section-title">Best seller</h3>
    <div class="sidebar-widget-body outer-top-xs">
        <div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs ">

            @foreach ($sell_products as $product)
            <div class="item">
                <div class="products best-product">
                    <div class="product">
                        <div class="product-micro">
                            <div class="row product-micro-row">
                                <div class="col col-xs-5">
                                    <div class="product-image">
                                        <div class="image"> <a href="{{route('product.details', $product->id)}}">
                                            <img src="{{asset('uploads/products/thumbnail/'.$product->product_thumbnail)}}" alt="image"> </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2 col-xs-7">
                                    <div class="product-info">
                                        <h3 class="name"><a href="{{route('product.details', $product->id)}}">{{$product->name}}</a></h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="product-price">
                                            @if ($product->special_price > 0 )
                                            <span class="price">{{ number_format($product->special_price, 2) }}</span>
                                            <span class="price-before-discount">{{ number_format($product->regular_price, 2) }}</span>
                                            @else
                                            <span class="price">{{ number_format($product->regular_price, 2) }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
    <!-- /.sidebar-widget-body -->
</div>
