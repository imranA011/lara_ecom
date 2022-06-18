<section class="section featured-product wow fadeInUp">
    <h3 class="section-title">Featured products</h3>
    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

        @foreach ($f_products as $product)

        <div class="item item-carousel">
            <div class="products">

                <div class="product">
                    <div class="product-image">
                        <div class="image"> <a href="{{route('product.details', $product->id)}}">
                            <img src="{{asset('uploads/products/thumbnail/'.$product->product_thumbnail)}}" alt=""></a> </div>


                        <div class="tag hot"><span>hot</span></div>
                    </div>
                    <!-- /.product-image -->

                    <div class="product-info text-left">
                        <h3 class="name"><a href="detail.html">{{$product->name}}</a>
                        </h3>
                        <div class="rating rateit-small"></div>
                        <div class="description"></div>
                        <div class="product-price">
                            @if ($product->special_price > 0 )
                            <span class="price">{{ number_format($product->special_price, 2) }}</span>
                            <span class="price-before-discount">{{ number_format($product->regular_price, 2) }}</span>
                            @else
                            <span class="price">{{ number_format($product->regular_price, 2) }}</span>
                            @endif
                        </div>

                    </div>
                    <!-- /.product-info -->
                    <div class="cart clearfix animate-effect">
                        <div class="action">
                            <ul class="list-unstyled" style="display: flex">

                                <form action="{{route('add.to.cart')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="price" value="{{ $product->special_price > 0 ? $product->special_price : $product->regular_price}}">

                                    <li class="add-cart-button btn-group">
                                        <button class="btn btn-primary icon"  type="submit" name="submit" value="submit"> <i class="fa fa-shopping-cart"></i>
                                        </button>
                                    </li>
                                </form>
                                <li class="lnk wishlist">
                                    <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a>
                                </li>
                                <li class="lnk">
                                    <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a>
                                </li>

                            </ul>
                        </div>
                        <!-- /.action -->
                    </div>
                    <!-- /.cart -->
                </div>
                <!-- /.product -->

            </div>
            <!-- /.products -->
        </div>

        @endforeach

    </div>
    <!-- /.home-owl-carousel -->
</section>
