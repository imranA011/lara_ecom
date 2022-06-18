<div class="sl-sideleft">
    <div class="input-group input-group-search">
        <input type="search" name="search" class="form-control" placeholder="Search">
        <span class="input-group-btn">
            <button class="btn"><i class="fa fa-search"></i></button>
        </span>
    </div>

    <label class="sidebar-label"></label>
    <div class="sl-sideleft-menu">
        <a href="{{ route('admin.dashboard') }}" class="sl-menu-link active">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                <span class="menu-item-label">Dashboard</span>
            </div>
        </a>

        {{-- Category --}}
        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
                <span class="menu-item-label">Categories</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a>
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('add.category.show') }}" class="nav-link">Add
                    Category</a></li>
            <li class="nav-item"><a href="{{ route('add.sub.category.show') }}" class="nav-link">Add
                    Sub-Category</a></li>
            {{-- <li class="nav-item"><a href="{{ route('add.category.show') }}" class="nav-link">Add Sub-SubCategory</a></li> --}}
            <li class="nav-item"><a href="{{ route('category.show') }}" class="nav-link">Manage
                    Categories</a></li>
            <li class="nav-item"><a href="{{ route('sub.category.show') }}" class="nav-link">Manage
                    Sub-Categories</a></li>
            {{-- <li class="nav-item"><a href="{{ route('sub.category.show') }}" class="nav-link">Manage Sub-SubCategories</a></li> --}}
        </ul>

        {{-- Brand --}}
        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
                <span class="menu-item-label">Brands</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a>
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('add.brand.show') }}" class="nav-link">Add Brand</a>
            </li>
            <li class="nav-item"><a href="{{ route('brand.show') }}" class="nav-link">Manage Brands</a>
            </li>
        </ul>

        {{-- Product --}}
        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
                <span class="menu-item-label">Products</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a>
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('add.product.show') }}" class="nav-link">Add
                    Product</a></li>
            <li class="nav-item"><a href="{{ route('product.show') }}" class="nav-link">Manage
                    Products</a></li>
        </ul>

        {{-- Product Attribute --}}
        <a href="{{ route('show.product.attributes') }}" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
                <span class="menu-item-label">Product Attributes</span>
            </div>
        </a>

        {{-- Slider --}}
        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
                <span class="menu-item-label">Media Library</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div>
        </a>
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('add.banner.show') }}" class="nav-link">Add Banner</a>
            <li class="nav-item"><a href="{{ route('add.slider.show') }}" class="nav-link">Add Slider</a>
            <li class="nav-item"><a href="{{ route('banner.show') }}" class="nav-link">Manage Banners</a>
            <li class="nav-item"><a href="{{ route('slider.show') }}" class="nav-link">Manage Sliders</a>
            </li>
        </ul>

        {{-- Coupon --}}
        <a href="{{ route('coupon.index') }}" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
                <span class="menu-item-label">Coupons</span>
            </div>
        </a>

        {{-- Offer --}}
        <a href="{{ route('show.offers') }}" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
                <span class="menu-item-label">Offers</span>
            </div>
        </a>

        {{-- Order--}}
        <a href="{{ route('show.all.orders') }}" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
                <span class="menu-item-label">Orders</span>
            </div>
        </a>

         {{-- Blog Post --}}
         <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
                <span class="menu-item-label">Blog Posts</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div>
        </a>
        <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="{{ route('add.post.show') }}" class="nav-link">Add Post</a></li>
                <li class="nav-item"><a href="{{ route('post.show') }}" class="nav-link">Manage Posts</a></li>
        </ul>

    </div><!-- sl-sideleft-menu -->
</div><!-- sl-sideleft -->
