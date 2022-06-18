<header class="header-style-1">

    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown">
        <div class="container">
            <div class="header-top-inner ">
                <div class="cnt-account">
                    <ul class="list-unstyled">
                        @guest
                            <li><a href="#"><i class="icon fa fa-heart"></i>Terms</a></li>
                            <li><a href="#"><i class="icon fa fa-heart"></i>FAQ</a></li>
                            <li><a href="#"><i class="icon fa fa-heart"></i>Wishlist</a></li>
                            <li><a href="{{ route('user.login.show') }}"><i class="icon fa fa-lock"></i>login</a></li>
                        @endguest

                        @auth
                            <li><a href="{{ route('track.order') }}"><i class="icon fa fa-shopping-cart"></i>Track Order</a></li>
                            @php
                                $cart = App\Models\Cart::where('user_ip', request()->ip())->first();
                            @endphp
                            @if($cart != null)
                            <li><a href="{{ route('page.checkout') }}"><i class="icon fa fa-check"></i>Checkout</a></li>
                            @else
                            <li><a href=""><i class="icon fa fa-check"></i>Checkout</a></li>
                            @endif
                            <li><a href="{{ route('user.profile.show') }}"><i class="icon fa fa-user"></i>My Account</a>
                            </li>
                            <li><a href="{{ route('user.logout') }}"><i class="icon fa fa-user"></i>logout</a></li>
                        @endauth
                    </ul>
                </div>
                <!-- /.cnt-account -->

                <div class="cnt-block">
                    <ul class="list-unstyled list-inline">
                        <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown"
                                data-toggle="dropdown"><span class="value">USD </span><b
                                    class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">USD</a></li>
                                <li><a href="#">BDT</a></li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown"
                                data-toggle="dropdown"><span class="value">English </span><b
                                    class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">English</a></li>
                                <li><a href="#">Bangla</a></li>
                            </ul>
                        </li>
                    </ul>
                    <!-- /.list-unstyled -->
                </div>
                <!-- /.cnt-cart -->

                <div class="clearfix"></div>
            </div>
            <!-- /.header-top-inner -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.header-top -->

    <!-- ============================================== TOP MENU : END ============================================== -->
    <div class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                    <!-- ============================================================= LOGO ============================================================= -->
                    <div class="logo"> <a href="{{ route('page.home') }}"> <img
                                src="{{ asset('frontend/assets/images/logo.png') }}" alt="logo"> </a> </div>
                    <!-- /.logo -->
                    <!-- ============================================================= LOGO : END ============================================================= -->
                </div>
                <!-- /.logo-holder -->

                <div class="col-xs-12 col-sm-12 col-md-6 top-search-holder">
                    <!-- /.contact-row -->
                    <!-- ============================================================= SEARCH AREA ============================================================= -->
                    <div class="search-area ">
                        <form>
                            <div class="control-group ">
                                <ul class="categories-filter animate-dropdown">
                                    <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown"
                                            href="category.html">Categories <b class="caret"></b></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li class="menu-header">Computer</li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                    href="category.html">- Clothing</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                    href="category.html">- Electronics</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                    href="category.html">- Shoes</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                    href="category.html">- Watches</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <input class="search-field" placeholder="Search here..." />
                                <a class="search-button" href="#"></a>
                            </div>
                        </form>
                    </div>
                    <!-- /.search-area -->
                    <!-- ============================================================= SEARCH AREA : END ============================================================= -->
                </div>
                <!-- /.top-search-holder -->


                <div class="col-xs-12 col-sm-12 col-md-3 animate-dropdown top-cart-row ">
                    <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
                    @guest
                        <div class="dropdown dropdown-cart">
                            <a href="{{ route('page.shopping.cart') }}" class="dropdown-toggle lnk-cart"
                                data-toggle="dropdown">
                                <div class="items-cart-inner">
                                    @php
                                        $cart_subtotal = App\Models\Cart::all()
                                            ->where('user_ip', request()->ip())
                                            ->sum(function ($t) {
                                                return $t->price * $t->quantity;
                                            });
                                        $cart_quantity = App\Models\Cart::all()
                                            ->where('user_ip', request()->ip())
                                            ->sum('quantity');
                                        $cartItems = App\Models\Cart::where('user_ip', request()->ip())->get();
                                    @endphp
                                    <div class="basket">
                                        <i class="glyphicon glyphicon-shopping-cart"></i> </div>
                                    <div class="basket-item-count">
                                        <span class="count">{{ $cart_quantity }}</span>
                                    </div>
                                    <div class="total-price-basket"> <span class="lbl">cart -</span>
                                        <span class="total-price"> <span class="sign">$</span>
                                        <span class="value"> </span>{{ number_format($cart_subtotal, 2) }} </span>
                                    </div>
                                </div>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <div class="cart-item product-summary">
                                        @foreach ($cartItems as $cartItem)
                                            <div class="row">
                                                <div class="col-xs-4">
                                                    <div class="image">
                                                        <a href="">
                                                            <img src="{{ asset('uploads/products/thumbnail/' . $cartItem->product->product_thumbnail) }}" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-xs-7">
                                                    <h3 class="name"><a
                                                            href="">{{ $cartItem->product->name }}</a></h3>
                                                    <div>${{ $cartItem->price }}
                                                        <span>X</span>
                                                        <span>{{ $cartItem->quantity }}</span>
                                                        <span> = </span>
                                                        <span class="price">${{ number_format($cartItem->price * $cartItem->quantity, 2) }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-xs-1 action">
                                                    <a href="{{ route('cart.delete', $cartItem->id) }}"><i
                                                            class="fa fa-trash"></i></a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <!-- /.cart-item -->
                                    <div class="clearfix"></div>

                                        @php
                                        $cart = App\Models\Cart::where('user_ip', request()->ip())->first();
                                        @endphp
                                        @if($cart == null)
                                        <div class="row ">
                                            <h4 class="text-center m-b-20">Cart is empty</h4>
                                            <div class="cart-checkout-btn d-block text-center">
                                                <a href="{{ route('page.shop') }}" type="button" class="btn btn-upper btn-primary ">Shop Now</a>
                                            </div>
                                        @else
                                        <hr>
                                        <div class="clearfix cart-total">
                                            <div class="pull-right"> <span class="text">Sub Total :</span><span
                                                    class='price'>$</span>{{ number_format($cart_subtotal, 2) }}</div>
                                            <div class="clearfix"></div>
                                            <a href="{{ route('page.shopping.cart') }}"
                                                class="btn btn-upper btn-primary btn-block m-t-20">View Cart</a>
                                            <a href="{{ route('page.checkout') }}"
                                                class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a>
                                        </div>
                                        @endif
                                    <!-- /.cart-total-->
                                </li>
                            </ul>
                            <!-- /.dropdown-menu-->
                        </div>
                        <!-- /.dropdown-cart -->
                    @endguest
                    @auth
                        @php
                            $cart_subtotal = App\Models\Cart::all()
                                ->where('user_ip', request()->ip())
                                ->sum(function ($t) {
                                    return $t->price * $t->quantity;
                                });
                            $cart_quantity = App\Models\Cart::all()
                                ->where('user_ip', request()->ip())
                                ->sum('quantity');
                        @endphp

                        <div class="text-center">
                            <a href="#"><i class="icon fa fa-heart my-wishlist"></i></a>
                            <a class="my-cart" href="{{ route('page.shopping.cart') }}">
                                <sup class="cart-count">{{ $cart_quantity }}</sup>
                                <i class="icon fa fa-shopping-cart"> </i>
                                <small class="cart-count">{{ number_format($cart_subtotal, 2) }}</small> </a>
                            <span class="text-light">{{ Auth::user()->profile->name }}</span>
                            <span><img src="{{ asset('frontend') }}/assets/images/testimonials/member1.png"
                                    class="img-avatar" alt=""></span>
                        </div>
                    @endauth
                    <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->
                </div>
                <!-- /.top-cart-row -->
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

    </div>
    @if (session('cartMsg'))
        <h5 class="alert alert-success text-light text-right py-10 px-20 outer-right">{{ session('cartMsg') }}</h5>
    @endif
    <!-- /.main-header -->

    <!-- ============================================== NAVBAR ============================================== -->
    <div class="header-nav animate-dropdown">
        <div class="container">
            <div class="yamm navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse"
                        class="navbar-toggle collapsed" type="button">
                        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span
                            class="icon-bar"></span> <span class="icon-bar"></span> </button>
                </div>
                <div class="nav-bg-class">
                    <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                        <div class="nav-outer">
                            <ul class="nav navbar-nav">
                                <li class="active dropdown yamm-fw">
                                    <a href="{{ route('page.home') }}">Home</a>
                                </li>
                                <li class="active dropdown yamm-fw">
                                    <a href="{{ route('page.shop') }}">All Products</a>
                                </li>
                                <li class="active dropdown yamm-fw">
                                    <a href="">New Arrival</a>
                                </li>
                                <li class="active dropdown yamm-fw">
                                    <a href="">Best Selling</a>
                                </li>
                                <li class="active dropdown yamm-fw">
                                    <a href="{{ route('page.featured.products') }}">Featured Products</a>
                                </li>
                                <li class="active dropdown yamm-fw">
                                    <a href="">hot deals</a>
                                </li>
                                <li class="active dropdown yamm-fw">
                                    <a href="">special offer</a>
                                </li>
                                <li class="active dropdown yamm-fw">
                                    <a href="">All Brands</a>
                                </li>

                                @guest
                                    <li class="dropdown  navbar-right special-menu"> <a href="#">Todays offer</a> </li>
                                @endguest
                                @auth
                                    <li class="dropdown  navbar-right special-menu"> <a href="#">my offer</a> </li>
                                @endauth

                            </ul>
                            <!-- /.navbar-nav -->
                            <div class="clearfix"></div>
                        </div>
                        <!-- /.nav-outer -->
                    </div>
                    <!-- /.navbar-collapse -->

                </div>
                <!-- /.nav-bg-class -->
            </div>
            <!-- /.navbar-default -->
        </div>
        <!-- /.container-class -->

    </div>
    <!-- /.header-nav -->
    <!-- ============================================== NAVBAR : END ============================================== -->

</header>
