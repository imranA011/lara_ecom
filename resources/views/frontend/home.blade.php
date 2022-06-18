@extends('layouts.frontend-master')
@section('page-title', 'Home')

@section('content')
    <div class="body-content outer-top-xs" id="top-banner-and-menu">
        <div class="container">
            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-3 sidebar">

                    <div class="side-menu animate-dropdown outer-bottom-xs">
                        <div class="head">
                            <i class="icon fa fa-align-justify fa-fw"></i> Categories
                        </div>
                        <nav class="yamm megamenu-horizontal">
                            <ul class="nav">
                                @foreach($categories as $category)
                                <li class="dropdown menu-item">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                       <i class="icon fa fa-shopping-bag" aria-hidden="true"></i>
                                        {{ Str::upper($category->category_name) }}
                                    </a>
                                    <ul class="dropdown-menu mega-menu">
                                        <li class="yamm-content">
                                            <div class="row">
                                                @php
                                                $subcategories = App\Models\SubCategory::where('category_id', $category->id)->get()
                                                @endphp
                                                @forelse($subcategories as $subcategory)
                                                <div class="col-sm-12 col-md-3">
                                                    <ul class="links list-unstyled ">

                                                        <li>
                                                            <a href="{{route('category.wise.product', $subcategory->id)}}">
                                                                <h6>{{ Str::upper($subcategory->sub_category_name) }}</h6>
                                                            </a>
                                                        </li>

                                                    </ul>
                                                </div>
                                                @empty
                                                <p class="outer-top-ss">No Sub-Category Available</p>
                                                @endforelse
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>

                    <!-- ====================== HOT DEALS ===================== -->

                    @include('partials.inc.hot-deals')

                    <!-- =================== HOT DEALS: END ===================== -->

                    <!-- ==================== SPECIAL OFFER ==================== -->

                    @include('partials.inc.special-offers')                   

                    <!-- ============================================== SPECIAL OFFER : END ============================================== -->
                    <!-- ============================================== PRODUCT TAGS ============================================== -->
                    <div class="sidebar-widget product-tag wow fadeInUp">
                        <h3 class="section-title">Product tags</h3>
                        <div class="sidebar-widget-body outer-top-xs">
                            <div class="tag-list"> <a class="item" title="Phone"
                                    href="category.html">Phone</a> <a class="item active" title="Vest"
                                    href="category.html">Vest</a> <a class="item" title="Smartphone"
                                    href="category.html">Smartphone</a> <a class="item" title="Furniture"
                                    href="category.html">Furniture</a> <a class="item" title="T-shirt"
                                    href="category.html">T-shirt</a> <a class="item" title="Sweatpants"
                                    href="category.html">Sweatpants</a> <a class="item" title="Sneaker"
                                    href="category.html">Sneaker</a> <a class="item" title="Toys"
                                    href="category.html">Toys</a> <a class="item" title="Rose"
                                    href="category.html">Rose</a> </div>
                            <!-- /.tag-list -->
                        </div>
                        <!-- /.sidebar-widget-body -->
                    </div>
                    <!-- /.sidebar-widget -->
                    <!-- ============================================== PRODUCT TAGS : END ============================================== -->
                    <!-- ============================================== SPECIAL DEALS ============================================== -->

                    <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                        <h3 class="section-title">Special Deals</h3>
                        <div class="sidebar-widget-body outer-top-xs">
                            <div
                                class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                                <div class="item">
                                    <div class="products special-product">
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image"> <a href="#"> <img
                                                                        src="assets/images/products/p28.jpg" alt=""> </a>
                                                            </div>
                                                            <!-- /.image -->

                                                        </div>
                                                        <!-- /.product-image -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print Shirt</a>
                                                            </h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price"> <span class="price">
                                                                    $450.99 </span> </div>
                                                            <!-- /.product-price -->

                                                        </div>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.product-micro-row -->
                                            </div>
                                            <!-- /.product-micro -->

                                        </div>
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image"> <a href="#"> <img
                                                                        src="assets/images/products/p15.jpg" alt=""> </a>
                                                            </div>
                                                            <!-- /.image -->

                                                        </div>
                                                        <!-- /.product-image -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print Shirt</a>
                                                            </h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price"> <span class="price">
                                                                    $450.99 </span> </div>
                                                            <!-- /.product-price -->

                                                        </div>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.product-micro-row -->
                                            </div>
                                            <!-- /.product-micro -->

                                        </div>
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image"> <a href="#"> <img
                                                                        src="assets/images/products/p26.jpg" alt="image">
                                                                </a> </div>
                                                            <!-- /.image -->

                                                        </div>
                                                        <!-- /.product-image -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print Shirt</a>
                                                            </h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price"> <span class="price">
                                                                    $450.99 </span> </div>
                                                            <!-- /.product-price -->

                                                        </div>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.product-micro-row -->
                                            </div>
                                            <!-- /.product-micro -->

                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="products special-product">
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image"> <a href="#"> <img
                                                                        src="assets/images/products/p18.jpg" alt=""> </a>
                                                            </div>
                                                            <!-- /.image -->

                                                        </div>
                                                        <!-- /.product-image -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print Shirt</a>
                                                            </h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price"> <span class="price">
                                                                    $450.99 </span> </div>
                                                            <!-- /.product-price -->

                                                        </div>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.product-micro-row -->
                                            </div>
                                            <!-- /.product-micro -->

                                        </div>
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image"> <a href="#"> <img
                                                                        src="assets/images/products/p17.jpg" alt=""> </a>
                                                            </div>
                                                            <!-- /.image -->

                                                        </div>
                                                        <!-- /.product-image -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print Shirt</a>
                                                            </h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price"> <span class="price">
                                                                    $450.99 </span> </div>
                                                            <!-- /.product-price -->

                                                        </div>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.product-micro-row -->
                                            </div>
                                            <!-- /.product-micro -->

                                        </div>
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image"> <a href="#"> <img
                                                                        src="assets/images/products/p16.jpg" alt=""> </a>
                                                            </div>
                                                            <!-- /.image -->

                                                        </div>
                                                        <!-- /.product-image -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print Shirt</a>
                                                            </h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price"> <span class="price">
                                                                    $450.99 </span> </div>
                                                            <!-- /.product-price -->
                                                        </div>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.product-micro-row -->
                                            </div>
                                            <!-- /.product-micro -->

                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="products special-product">
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image"> <a href="#"> <img
                                                                        src="assets/images/products/p15.jpg" alt="images">
                                                                    <div class="zoom-overlay"></div>
                                                                </a> </div>
                                                            <!-- /.image -->

                                                        </div>
                                                        <!-- /.product-image -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print Shirt</a>
                                                            </h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price"> <span class="price">
                                                                    $450.99 </span> </div>
                                                            <!-- /.product-price -->

                                                        </div>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.product-micro-row -->
                                            </div>
                                            <!-- /.product-micro -->

                                        </div>
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image"> <a href="#"> <img
                                                                        src="assets/images/products/p14.jpg" alt="">
                                                                    <div class="zoom-overlay"></div>
                                                                </a> </div>
                                                            <!-- /.image -->

                                                        </div>
                                                        <!-- /.product-image -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print Shirt</a>
                                                            </h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price"> <span class="price">
                                                                    $450.99 </span> </div>
                                                            <!-- /.product-price -->

                                                        </div>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.product-micro-row -->
                                            </div>
                                            <!-- /.product-micro -->

                                        </div>
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image"> <a href="#"> <img
                                                                        src="assets/images/products/p13.jpg" alt="image">
                                                                </a> </div>
                                                            <!-- /.image -->

                                                        </div>
                                                        <!-- /.product-image -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print Shirt</a>
                                                            </h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price"> <span class="price">
                                                                    $450.99 </span> </div>
                                                            <!-- /.product-price -->

                                                        </div>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.product-micro-row -->
                                            </div>
                                            <!-- /.product-micro -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.sidebar-widget-body -->
                    </div>
                    <!-- /.sidebar-widget -->
                    <!-- ============================================== SPECIAL DEALS : END ============================================== -->
                    <!-- ============================================== NEWSLETTER ============================================== -->
                    <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
                        <h3 class="section-title">Newsletters</h3>
                        <div class="sidebar-widget-body outer-top-xs">
                            <p>Sign Up for Our Newsletter!</p>
                            <form>
                                <div class="form-group">
                                    <label class="sr-only" for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        placeholder="Subscribe to our newsletter">
                                </div>
                                <button class="btn btn-primary">Subscribe</button>
                            </form>
                        </div>
                        <!-- /.sidebar-widget-body -->
                    </div>
                    <!-- /.sidebar-widget -->
                    <!-- ============================================== NEWSLETTER: END ============================================== -->

                    <!-- ============================================== Testimonials============================================== -->
                    <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
                        <div id="advertisement" class="advertisement">
                            <div class="item">
                                <div class="avatar"><img src="assets/images/testimonials/member1.png" alt="Image">
                                </div>
                                <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port
                                    mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                                <div class="clients_author">John Doe <span>Abc Company</span> </div>
                                <!-- /.container-fluid -->
                            </div>
                            <!-- /.item -->

                            <div class="item">
                                <div class="avatar"><img src="assets/images/testimonials/member3.png" alt="Image">
                                </div>
                                <div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port
                                    mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                                <div class="clients_author">Stephen Doe <span>Xperia Designs</span> </div>
                            </div>
                            <!-- /.item -->

                            <div class="item">
                                <div class="avatar"><img src="assets/images/testimonials/member2.png" alt="Image">
                                </div>
                                <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port
                                    mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                                <div class="clients_author">Saraha Smith <span>Datsun &amp; Co</span> </div>
                                <!-- /.container-fluid -->
                            </div>
                            <!-- /.item -->

                        </div>
                        <!-- /.owl-carousel -->
                    </div>

                    <!-- ============================================== Testimonials: END ============================================== -->

                    <div class="home-banner"> <img src="assets/images/banners/LHS-banner.jpg" alt="Image"> </div>
                    </div>

                <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
                    <!-- ========================================== SECTION – HERO ========================================= -->

                    @include('partials.inc.hero-sliders')

                    <!-- ========================================= SECTION – HERO : END ========================================= -->

                    <!-- ============================================== INFO BOXES ============================================== -->
                    <div class="info-boxes wow fadeInUp">
                        <div class="info-boxes-inner">
                            <div class="row">
                                <div class="col-md-6 col-sm-4 col-lg-4">
                                    <div class="info-box">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <h4 class="info-box-heading green">money back</h4>
                                            </div>
                                        </div>
                                        <h6 class="text">30 Days Money Back Guarantee</h6>
                                    </div>
                                </div>
                                <!-- .col -->

                                <div class="hidden-md col-sm-4 col-lg-4">
                                    <div class="info-box">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <h4 class="info-box-heading green">free shipping</h4>
                                            </div>
                                        </div>
                                        <h6 class="text">Shipping on orders over $99</h6>
                                    </div>
                                </div>
                                <!-- .col -->

                                <div class="col-md-6 col-sm-4 col-lg-4">
                                    <div class="info-box">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <h4 class="info-box-heading green">Special Sale</h4>
                                            </div>
                                        </div>
                                        <h6 class="text">Extra $5 off on all items </h6>
                                    </div>
                                </div>
                                <!-- .col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.info-boxes-inner -->

                    </div>
                    <!-- /.info-boxes -->
                    <!-- ============================================== INFO BOXES : END ============================================== -->
                    <!-- ============================================== SCROLL TABS ============================================== -->

                    @include('partials.inc.new-products')

                    <!-- /.scroll-tabs -->
                    <!-- ============================================== SCROLL TABS : END ============================================== -->

                    <!-- ============================================== WIDE PRODUCTS ============================================== -->

                    @include('partials.inc.home-banner-one')

                    <!-- /.wide-banners -->

                    <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
                    <!-- ============================================== FEATURED PRODUCTS ============================================== -->

                    @include('partials.inc.featured-products')

                    <!-- /.section -->
                    <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
                    <!-- ============================================== WIDE PRODUCTS ============================================== -->
                    @include('partials.inc.home-banner-two')

                    <!-- /.wide-banners -->
                    <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
                    <!-- ============================================== BEST SELLER ============================================== -->

                    @include('partials.inc.best-selling')

                    <!-- /.sidebar-widget -->
                    <!-- ============================================== BEST SELLER : END ============================================== -->

                    <!-- ============================================== BLOG SLIDER ============================================== -->

                    @include('partials.inc.blog-posts')

                    <!-- /.section -->
                    <!-- ============================================== BLOG SLIDER : END ============================================== -->

                    <!-- ============================================== FEATURED PRODUCTS ============================================== -->

                    @include('partials.inc.new-arrivals')

                    <!-- /.section -->
                    <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->

                </div>
            </div>

            <!-- =========================== BRANDS CAROUSEL ======================== -->

            @include('partials.inc.brands')

            <!-- ==================== BRANDS CAROUSEL END =================== -->
        </div>
    </div>
@endsection
