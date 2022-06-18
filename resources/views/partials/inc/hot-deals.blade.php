<div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
    <h3 class="section-title">hot deals</h3>
    <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">

        @foreach ($hot_products as $product)
        <div class="item">
            <div class="products">
                <div class="hot-deal-wrapper">
                    <div class="image"> 
                        <img src="{{asset('uploads/products/thumbnail/'.$product->product_thumbnail)}}" alt="">
                    </div>
                    <div class="sale-offer-tag"><span>{{$product->discount}}%<br>
                            off</span></div>
                    <div class="timing-wrapper">
                        <div class="box-wrapper">
                            <div class="date box"> <span class="key">120</span> <span
                                    class="value">DAYS</span> </div>
                        </div>
                        <div class="box-wrapper">
                            <div class="hour box"> <span class="key">20</span> <span
                                    class="value">HRS</span> </div>
                        </div>
                        <div class="box-wrapper">
                            <div class="minutes box"> <span class="key">36</span> <span
                                    class="value">MINS</span> </div>
                        </div>
                        <div class="box-wrapper hidden-md">
                            <div class="seconds box"> <span class="key">60</span> <span
                                    class="value">SEC</span> </div>
                        </div>
                    </div>
                </div>

                <div class="product-info text-left m-t-20">
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

                <div class="cart clearfix animate-effect">
                    <div class="action">
                        <div class="add-cart-button btn-group">
                            <form action="{{route('add.to.cart')}}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="price" value="{{ $product->special_price > 0 ? $product->special_price : $product->regular_price}}">

                                <li class="add-cart-button btn-group">
                                    <button class="btn btn-primary icon"  type="submit" name="submit" value="submit"> <i class="fa fa-shopping-cart"></i></button>
                                    <button class="btn btn-primary cart-btn"  type="submit" name="submit" value="submit"><span>Add to Cart</span>
                                    </button>
                                </li>
                            </form>            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        
    </div>
</div>
