@extends('layouts.frontend-master')
@section('page-title', 'Shop')

@section('content')

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="#">Home</a></li>
                <li class='active'>Handbags</li>
            </ul>
        </div>
        <!-- /.breadcrumb-inner -->
    </div>
    <!-- /.container -->
</div>

<div class="body-content outer-top-xs">
    <div class='container'>
        <div class='row'>

            <div class='col-md-3 sidebar'>
                <div class="sidebar-module-container">
                    <div class="sidebar-filter">
                        <div class="sidebar-widget wow fadeInUp">
                            <h3 class="section-title">shop by</h3>
                            <div class="widget-header">
                                <h4 class="widget-title">All Categories</h4>
                            </div>
                            <div class="sidebar-widget-body">
                                <div class="accordion">

                                    @foreach ($categories as $category)
                                    <div class="accordion-group">
                                        <div class="accordion-heading"><a href="#category{{$category->id}}" data-toggle="collapse" class="accordion-toggle collapsed"> {{ $category->category_name }} </a></div>
                                        <div class="accordion-body collapse" id="category{{$category->id}}" style="height: 0px;">
                                            <div class="accordion-inner">
                                                <ul>
                                                @php
                                                $subcategories = App\Models\SubCategory::where('category_id', $category->id)->get()
                                                @endphp
                                                    @foreach ($subcategories as $subcategory)
                                                    <li><a href="{{route('category.wise.product', $subcategory->id)}}">{{ $subcategory->sub_category_name }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>

                        <div class="sidebar-widget wow fadeInUp">
                            <div class="widget-header">
                                <h4 class="widget-title">Price Slider</h4>
                            </div>
                            <div class="sidebar-widget-body m-t-10">
                                <div class="price-range-holder"><span class="min-max"> <span class="pull-left">$200.00</span> <span class="pull-right">$800.00</span> </span>
                                    <input type="text" id="amount" style="border:0; color:#666666; font-weight:bold;text-align:center;">
                                    <input type="text" class="price-slider" value="">
                                </div>
                                <!-- /.price-range-holder -->
                                <a href="#" class="lnk btn btn-primary">Show Now</a></div>
                            <!-- /.sidebar-widget-body -->
                        </div>
                        <!-- /.sidebar-widget -->
                        <!-- ============================================== PRICE SILDER : END ============================================== -->
                        <!-- ============================================== MANUFACTURES============================================== -->
                        <div class="sidebar-widget wow fadeInUp">
                            <div class="widget-header">
                                <h4 class="widget-title">All Brands</h4>
                            </div>
                            <div class="sidebar-widget-body">
                                <ul class="list">

                                    @foreach ($brands as $brand)
                                    <li><a href="#">{{ $brand->brand_name }}</a></li>
                                    @endforeach

                                </ul>
                                <!--<a href="#" class="lnk btn btn-primary">Show Now</a>-->
                            </div>
                            <!-- /.sidebar-widget-body -->
                        </div>
                        <!-- /.sidebar-widget -->
                        <!-- ============================================== MANUFACTURES: END ============================================== -->
                        <!-- ============================================== COLOR============================================== -->
                        <div class="sidebar-widget wow fadeInUp">
                            <div class="widget-header">
                                <h4 class="widget-title">Colors</h4>
                            </div>
                            <div class="sidebar-widget-body">
                                <ul class="list">
                                    <li><a href="#">Red</a></li>
                                    <li><a href="#">Blue</a></li>
                                    <li><a href="#">Yellow</a></li>
                                    <li><a href="#">Pink</a></li>
                                    <li><a href="#">Brown</a></li>
                                    <li><a href="#">Teal</a></li>
                                </ul>
                            </div>
                            <!-- /.sidebar-widget-body -->
                        </div>
                        <!-- /.sidebar-widget -->
                        <!-- ============================================== COLOR: END ============================================== -->
                        <!-- ============================================== COMPARE============================================== -->
                        <div class="sidebar-widget wow fadeInUp outer-top-vs">
                            <h3 class="section-title">Compare products</h3>
                            <div class="sidebar-widget-body">
                                <div class="compare-report">
                                    <p>You have no <span>item(s)</span> to compare</p>
                                </div>
                                <!-- /.compare-report -->
                            </div>
                            <!-- /.sidebar-widget-body -->
                        </div>
                        <!-- /.sidebar-widget -->
                        <!-- ============================================== COMPARE: END ============================================== -->
                        <!-- ============================================== PRODUCT TAGS ============================================== -->
                        <div class="sidebar-widget product-tag wow fadeInUp outer-top-vs">
                            <h3 class="section-title">Product tags</h3>
                            <div class="sidebar-widget-body outer-top-xs">
                                <div class="tag-list"><a class="item" title="Phone" href="category.html">Phone</a> <a class="item active" title="Vest" href="category.html">Vest</a> <a class="item" title="Smartphone"
                                                                                                                                                                                        href="category.html">Smartphone</a>
                                    <a class="item" title="Furniture" href="category.html">Furniture</a> <a class="item" title="T-shirt" href="category.html">T-shirt</a> <a class="item" title="Sweatpants"
                                                                                                                                                                             href="category.html">Sweatpants</a> <a
                                        class="item" title="Sneaker" href="category.html">Sneaker</a> <a class="item" title="Toys" href="category.html">Toys</a> <a class="item" title="Rose" href="category.html">Rose</a>
                                </div>
                                <!-- /.tag-list -->
                            </div>
                            <!-- /.sidebar-widget-body -->
                        </div>
                        <!-- /.sidebar-widget -->
                        <!----------- Testimonials------------->
                        <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
                            <div id="advertisement" class="advertisement">
                                <div class="item">
                                    <div class="avatar"><img src="assets/images/testimonials/member1.png" alt="Image"></div>
                                    <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                                    <div class="clients_author">John Doe <span>Abc Company</span></div>
                                    <!-- /.container-fluid -->
                                </div>
                                <!-- /.item -->

                                <div class="item">
                                    <div class="avatar"><img src="assets/images/testimonials/member3.png" alt="Image"></div>
                                    <div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                                    <div class="clients_author">Stephen Doe <span>Xperia Designs</span></div>
                                </div>
                                <!-- /.item -->

                                <div class="item">
                                    <div class="avatar"><img src="assets/images/testimonials/member2.png" alt="Image"></div>
                                    <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                                    <div class="clients_author">Saraha Smith <span>Datsun &amp; Co</span></div>
                                    <!-- /.container-fluid -->
                                </div>
                                <!-- /.item -->

                            </div>
                            <!-- /.owl-carousel -->
                        </div>

                        <!-- ============================================== Testimonials: END ============================================== -->

                        <div class="home-banner"><img src="assets/images/banners/LHS-banner.jpg" alt="Image"></div>
                    </div>
                    <!-- /.sidebar-filter -->
                </div>
                <!-- /.sidebar-module-container -->
            </div>

            <div class='col-md-9'>
                <div class="clearfix filters-container">
                    <div class="row">
                        <div class="col col-sm-6 col-md-2">
                            <div class="filter-tabs">
                                <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                                    <li class="active"><a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>Grid</a></li>
                                    <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>List</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col col-sm-12 col-md-6">
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
                            </div>
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
                            </div>
                        </div>
                    </div>
                </div>
                <div class="search-result-container ">
                    <div id="myTabContent" class="tab-content category-list">
                        <div class="tab-pane active " id="grid-container">
                            <div class="category-product">
                                <div class="row">

                                    @foreach ( $products as $product)
                                    <div class="col-sm-6 col-md-4 wow fadeInUp">
                                        <div class="products">
                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image"><a href="{{route('product.details', $product->id)}}">
                                                        <img src="{{asset('uploads/products/thumbnail/'.$product->product_thumbnail)}}" alt=""></a>
                                                    </div>
                                                    <div class="tag new"><span>new</span></div>
                                                </div>

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

                                                </div>
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
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
                                                <div class="col col-sm-8 col-lg-8">
                                                    <div class="product-info">
                                                        <h3 class="name"><a href="detail.html">{{ $product->name }}</a></h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="product-price"><span class="price">{{ $product->price }}</span> <span class="price-before-discount">$ 800</span></div>
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
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tag new"><span>new</span></div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    {{-- <div class="clearfix filters-container">
                        <div class="text-right">
                            <div class="pagination-container">
                                <ul class="list-inline list-unstyled">
                                    <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                                    <li><a href="#">1</a></li>
                                    <li class="active"><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>

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

</div>

@endsection

