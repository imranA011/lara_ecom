@extends('layouts.frontend-master')
@section('page-title', 'Shop-by-category')

@section('content')

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="#">Home</a></li>
                <li class='active'>Handbags</li>
            </ul>
        </div>
    </div>
</div>

<div class="body-content outer-top-xs">
    <div class='container'>
        <div class='row'>
            <div class='col-md-12'>
                <div class="clearfix filters-container m-t-10">
                    <div class="row">
                        <div class="col col-sm-6 col-md-3">
                            <div class="filter-tabs">
                                <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                                    <li class="active"><a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>Grid</a></li>
                                    <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>List</a></li>
                                </ul>
                            </div>
                            <!-- /.filter-tabs -->
                        </div>
                        <div class="col col-sm-6 col-md-7">
                            <div class="col col-sm-3 col-md-6 no-padding">
                                <div class="lbl-cnt"><span class="lbl">Sort by</span>
                                    <div class="fld inline">
                                        <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                                            <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> Position <span class="caret"></span></button>
                                            <ul role="menu" class="dropdown-menu">
                                                <li role="presentation"><a href="#">position</a></li>
                                                <li role="presentation"><a href="#">Price:Lowest first</a></li>
                                                <li role="presentation"><a href="#">Price:HIghest first</a></li>
                                                <li role="presentation"><a href="#">Product Name:A to Z</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- /.fld -->
                                </div>
                                <!-- /.lbl-cnt -->
                            </div>
                            <!-- /.col -->
                            <div class="col col-sm-3 col-md-6 no-padding">
                                <div class="lbl-cnt"><span class="lbl">Show</span>
                                    <div class="fld inline">
                                        <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                                            <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> 1 <span class="caret"></span></button>
                                            <ul role="menu" class="dropdown-menu">
                                                <li role="presentation"><a href="#">1</a></li>
                                                <li role="presentation"><a href="#">2</a></li>
                                                <li role="presentation"><a href="#">3</a></li>
                                                <li role="presentation"><a href="#">4</a></li>
                                                <li role="presentation"><a href="#">5</a></li>
                                                <li role="presentation"><a href="#">6</a></li>
                                                <li role="presentation"><a href="#">7</a></li>
                                                <li role="presentation"><a href="#">8</a></li>
                                                <li role="presentation"><a href="#">9</a></li>
                                                <li role="presentation"><a href="#">10</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- /.fld -->
                                </div>
                                <!-- /.lbl-cnt -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <div class="col col-sm-6 col-md-2">
                            <a class="btn btn-primary" href="{{route('page.shop')}}">Back to Shop</a>
                        </div>
                    </div>
                </div>

                <div class="search-result-container ">
                    <div id="myTabContent" class="tab-content category-list">
                        <div class="tab-pane active " id="grid-container">
                            <div class="category-product">
                                <div class="row">
                                    @foreach ( $products as $product)
                                    <div class="col-sm-6 col-md-3 wow fadeInUp">
                                        <div class="products">
                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image"><a href="{{route('product.details', $product->id)}}">
                                                        <img src="{{asset('uploads/products/thumbnail/'.$product->product_thumbnail)}}" alt=""></a>
                                                    </div>
                                                    <div class="tag new"><span>new</span></div>
                                                </div>
                                                <!-- /.product-image -->

                                                <div class="product-info text-left">
                                                    <h3 class="name"><a href="detail.html">{{$product->name}}</a></h3>
                                                    <div class="rating rateit-small"></div>

                                                    <div class="product-price">
                                                        @if ($product->special_price > 0)
                                                        <span class="price">${{ $product->special_price }}</span>
                                                        <span class="price-before-discount">${{ $product->regular_price }}</span>
                                                        @else
                                                        <span class="price">${{ $product->regular_price }}</span>
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
                                    @endforeach

                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.category-product -->

                        </div>
                        <!-- /.tab-pane -->

                        <div class="tab-pane " id="list-container">
                            <div class="category-product">

                                @foreach ( $products as $product)
                                <div class="category-product-inner wow fadeInUp">
                                    <div class="products">
                                        <div class="product-list product">
                                            <div class="row product-list-row">
                                                <div class="col col-sm-4 col-lg-4">
                                                    <div class="product-image">
                                                        <div class="image">
                                                            <img src="{{asset('uploads/products/'.$product->image)}}" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.col -->
                                                <div class="col col-sm-8 col-lg-8">
                                                    <div class="product-info">
                                                        <h3 class="name"><a href="detail.html">{{ $product->name }}</a></h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="product-price"><span class="price">{{ $product->price }}</span> <span class="price-before-discount">$ 800</span></div>
                                                        <!-- /.product-price -->
                                                        <div class="description m-t-10">{!! $product->short_description !!}
                                                        </div>
                                                        <div class="cart clearfix animate-effect">
                                                            <div class="action">
                                                                <ul class="list-unstyled">
                                                                    <li class="add-cart-button btn-group">
                                                                        <button class="btn btn-primary icon" data-toggle="dropdown" type="button"><i class="fa fa-shopping-cart"></i></button>
                                                                        <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                                                    </li>
                                                                    <li class="lnk wishlist"><a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a></li>
                                                                    <li class="lnk"><a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal"></i> </a></li>
                                                                </ul>
                                                            </div>
                                                            <!-- /.action -->
                                                        </div>
                                                        <!-- /.cart -->

                                                    </div>
                                                    <!-- /.product-info -->
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.product-list-row -->
                                            <div class="tag new"><span>new</span></div>
                                        </div>
                                        <!-- /.product-list -->
                                    </div>
                                    <!-- /.products -->
                                </div>
                                @endforeach

                            </div>
                            <!-- /.category-product -->
                        </div>
                        <!-- /.tab-pane #list-container -->
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        <div id="brands-carousel" class="logo-slider wow fadeInUp">
            <div class="logo-slider-inner">
                <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
                    <div class="item m-t-15"><a href="#" class="image"> <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt=""> </a></div>
                    <!--/.item-->

                    <div class="item m-t-10"><a href="#" class="image"> <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt=""> </a></div>
                    <!--/.item-->

                    <div class="item"><a href="#" class="image"> <img data-echo="assets/images/brands/brand3.png" src="assets/images/blank.gif" alt=""> </a></div>
                    <!--/.item-->

                    <div class="item"><a href="#" class="image"> <img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt=""> </a></div>
                    <!--/.item-->

                    <div class="item"><a href="#" class="image"> <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt=""> </a></div>
                    <!--/.item-->

                    <div class="item"><a href="#" class="image"> <img data-echo="assets/images/brands/brand6.png" src="assets/images/blank.gif" alt=""> </a></div>
                    <!--/.item-->

                    <div class="item"><a href="#" class="image"> <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt=""> </a></div>
                    <!--/.item-->

                    <div class="item"><a href="#" class="image"> <img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt=""> </a></div>
                    <!--/.item-->

                    <div class="item"><a href="#" class="image"> <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt=""> </a></div>
                    <!--/.item-->

                    <div class="item"><a href="#" class="image"> <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt=""> </a></div>
                    <!--/.item-->
                </div>
                <!-- /.owl-carousel #logo-slider -->
            </div>
            <!-- /.logo-slider-inner -->

        </div>
        <!-- /.logo-slider -->
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== --> </div>
    <!-- /.container -->

</div>

@endsection
