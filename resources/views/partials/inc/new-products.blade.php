<div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
    <div class="more-info-tab clearfix ">
        <h3 class="new-product-title pull-left">New Products</h3>
        <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">

            <li class="active"><a data-transition-type="backSlide" href="#all"
            data-toggle="tab">All</a></li>

            @foreach($categories->take(6) as $category)
                <li><a data-transition-type="backSlide" href="#category{{$category->id}}" data-toggle="tab">{{ $category->category_name }}</a>
                </li>
            @endforeach

        </ul>
        <!-- /.nav-tabs -->
    </div>

    <div class="tab-content outer-top-xs">
        <div class="tab-pane in active" id="all">
            <div class="product-slider">
              <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">

                @forelse ($new_products as $product)
                <div class="item item-carousel">
                    <div class="products">
                        <div class="product">
                            <div class="product-image">
                            <div class="image"> <a href="{{route('product.details', $product->id)}}">
                                <img  src="{{asset('uploads/products/thumbnail/'.$product->product_thumbnail)}}" alt="image"></a> </div>
                            <!-- /.image -->

                            <div class="tag new"><span>{{$product->discount > 0 ? $product->discount.'%' : 'new'}}</span></div>
                            </div>
                            <!-- /.product-image -->

                            <div class="product-info text-left">
                            <h3 class="name"><a href="detail.html">{{$product->name}}</a></h3>
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
                            <!-- /.product-price -->

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
                @empty
                <h4 class="text-center inner-bottom-20">No Product Found</h4>
                @endforelse

              </div>
            </div>
        </div>
        @foreach($categories as $category)
        <div class="tab-pane" id="category{{$category->id}}">
            <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">

                    @php
                    $products = App\Models\Product::where('category_id', $category->id)->latest()->get()
                    @endphp
                    @forelse ($products as $product)
                    <div class="item item-carousel">
                        <div class="products">
                            <div class="product">
                                <div class="product-image">
                                <div class="image"> <a href="{{route('product.details', $product->id)}}">
                                    <img  src="{{asset('uploads/products/thumbnail/'.$product->product_thumbnail)}}" alt="image"></a> </div>
                                <!-- /.image -->

                                <div class="tag new"><span>new</span></div>
                                </div>
                                <!-- /.product-image -->

                                <div class="product-info text-left">
                                <h3 class="name"><a href="detail.html">{{$product->name}}</a></h3>
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
                                <!-- /.product-price -->

                                </div>
                                <!-- /.product-info -->
                                <div class="cart clearfix animate-effect">
                                <div class="action">
                                    <ul class="list-unstyled" style="display: flex">

                                        <form action="{{url('add-to-cart')}}" method="POST">
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
                    @empty
                    <h4 class="text-center inner-bottom-20 ">No Product Found</h4>
                    @endforelse

                </div>
              <!-- /.home-owl-carousel -->
            </div>
            <!-- /.product-slider -->
        </div>

        @endforeach

    </div>
</div>
