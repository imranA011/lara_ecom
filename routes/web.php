<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductAttributeController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Admin\PostController;


use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//*******************************ADMIN ROUTES***********************************
Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login.show');
Route::post('/admin/login', [LoginController::class, 'submitLoginForm'])->name('admin.login.submit');
Route::get('/admin/logout', [LoginController::class, 'adminLogout'])->name('admin.logout');

Route::prefix('admin')->middleware(['admin.auth'])->group(function () {

    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

    //PRODUCT CATEGORIES ROUTES
    Route::get('/category', [CategoryController::class, 'showCategory'])->name('category.show');
    Route::get('/category/add-category', [CategoryController::class, 'showAddCategory'])->name('add.category.show');
    Route::post('/category/add-category', [CategoryController::class, 'submitAddCategory'])->name('add.category.submit');
    Route::get('/category/edit-category/{id}', [CategoryController::class, 'showEditCategory'])->name('edit.category.show');
    Route::post('/category/edit-category/{id}', [CategoryController::class, 'submitEditCategory'])->name('edit.category.submit');
    Route::get('/category/delete-category/{id}', [CategoryController::class, 'deleteCategory'])->name('delete.category');
    Route::get('/category/active/{id}', [CategoryController::class, 'activeCategory'])->name('active.category');
    Route::get('/category/inactive/{id}', [CategoryController::class, 'inactiveCategory'])->name('inactive.category');

    //PRODUCT SUB_CATEGORIES ROUTES
    Route::get('/sub-category', [SubCategoryController::class, 'showSubCategory'])->name('sub.category.show');
    Route::get('/sub-category/add-sub-category', [SubCategoryController::class, 'showAddSubCategory'])->name('add.sub.category.show');
    Route::post('/sub-category/add-sub-category', [SubCategoryController::class, 'submitAddSubCategory'])->name('add.sub.category.submit');
    Route::get('/sub-category/edit-sub-category/{id}', [SubCategoryController::class, 'showEditSubCategory'])->name('edit.sub.category.show');
    Route::post('/sub-category/edit-sub-category/{id}', [SubCategoryController::class, 'submitEditSubCategory'])->name('edit.sub.category.submit');
    Route::get('/sub-category/delete-sub-category/{id}', [SubCategoryController::class, 'deleteSubCategory'])->name('delete.sub.category');
    Route::get('/sub-category/{id}/{status}', [SubCategoryController::class, 'updateSubCategoryStatus'])->name('update.sub.category.status');

    //PRODUCT BRANDS ROUTES
    Route::get('/brand', [BrandController::class, 'showBrand'])->name('brand.show');
    Route::get('/brand/add-brand', [BrandController::class, 'showAddBrand'])->name('add.brand.show');
    Route::post('/brand/add-brand', [BrandController::class, 'submitAddBrand'])->name('add.brand.submit');
    Route::get('/brand/edit-brand/{id}', [BrandController::class, 'showUpdateBrand'])->name('update.brand.show');
    Route::post('/brand/edit-brand/{id}', [BrandController::class, 'submitUpdateBrand'])->name('update.brand.submit');
    Route::get('/brand/delete-brand/{id}', [BrandController::class, 'deleteBrand'])->name('delete.brand');
    Route::get('/brand/{id}/{status}', [BrandController::class, 'updateBrandStatus'])->name('update.brand.status');

    //PRODUCT UPLOAD ROUTES
    Route::get('/products', [ProductController::class, 'showProduct'])->name('product.show');
    Route::get('/product/add-product', [ProductController::class, 'showAddProduct'])->name('add.product.show');
    Route::post('/product/add-product', [ProductController::class, 'submitAddProduct'])->name('add.product.submit');
    Route::get('/product/edit-product/{id}', [ProductController::class, 'showEditProduct'])->name('edit.product.show');
    Route::post('/product/edit-product/{id}', [ProductController::class, 'submitEditProduct'])->name('edit.product.submit');
    Route::get('/product/delete-product/{id}', [ProductController::class, 'deleteProduct'])->name('delete.product');
    Route::get('/product-gallery/{id}', [ProductController::class, 'deleteImage'])->name('delete.gallery.image');
    Route::get('/product/{id}', [ProductController::class, 'viewProduct'])->name('view.product.show');
    Route::get('/featured-product/{id}/{status}', [ProductController::class, 'updateFeaturedStatus']);

    //PRODUCT ATTRIBUTES ROUTES
    Route::get('/product-attributes', [ProductAttributeController::class, 'showProductAttributes'])->name('show.product.attributes');
    Route::post('/product-attributes/add', [ProductAttributeController::class, 'storeProductAttributes'])->name('store.product.attributes');
    Route::get('/product-attribute/edit/{id}', [ProductAttributeController::class, 'showEditProductAttribute'])->name('show.edit.product.attribute');
    Route::post('/product-attribute/edit/{id}', [ProductAttributeController::class, 'submitEditProductAttribute'])->name('submit.edit.product.attribute');
    Route::get('/product-attribute/delete/{id}', [ProductAttributeController::class, 'deleteProductAttribute'])->name('delete.product.attribute');
    Route::get('/product-attribute/{id}/{status}', [ProductAttributeController::class, 'updateProductAttributeStatus']);
    Route::get('/product-attribute-items/{id}', [ProductAttributeController::class, 'showAttributeItems'])->name('show.attribute.items');
    Route::post('/product-attribute-item/{id}', [ProductAttributeController::class, 'storeAttributeItem'])->name('store.attribute.item');
    Route::get('/product-attribute-item/{id}', [ProductAttributeController::class, 'deleteAttributeItem'])->name('delete.attribute.item');

    //SLIDER ROUTES
    Route::get('/sliders', [SliderController::class, 'showSlider'])->name('slider.show');
    Route::get('/slider/add-slider', [SliderController::class, 'showAddSlider'])->name('add.slider.show');
    Route::post('/slider/add-slider', [SliderController::class, 'submitAddSlider'])->name('add.slider.submit');
    Route::get('/slider/edit-slider/{id}', [SliderController::class, 'showEditSlider'])->name('edit.slider.show');
    Route::post('/slider/edit-slider/{id}', [SliderController::class, 'submitEditSlider'])->name('edit.slider.submit');
    Route::get('/slider/delete-slider/{id}', [SliderController::class, 'deleteSlider'])->name('delete.slider');
    Route::get('/slider/{id}/{status}', [SliderController::class, 'updateSliderStatus'])->name('update.slider.status');

    //BANNER ROUTES
    Route::get('/banners', [BannerController::class, 'showBanner'])->name('banner.show');
    Route::get('/banner/add-banner', [BannerController::class, 'showAddBanner'])->name('add.banner.show');
    Route::post('/banner/add-banner', [BannerController::class, 'submitAddBanner'])->name('add.banner.submit');
    Route::get('/banner/edit-banner/{id}', [BannerController::class, 'showEditBanner'])->name('edit.banner.show');
    Route::post('/banner/edit-banner/{id}', [BannerController::class, 'submitEditBanner'])->name('edit.banner.submit');
    Route::get('/banner/delete-banner/{id}', [BannerController::class, 'deleteBanner'])->name('delete.banner');
    Route::get('/banner/{id}/{status}', [BannerController::class, 'updateBannerStatus'])->name('update.banner.status');

    //COUPON ROUTES
    Route::get('/coupons', [CouponController::class, 'index'])->name('coupon.index');
    Route::post('/coupon/add', [CouponController::class, 'store'])->name('coupon.store');
    Route::get('/coupon/edit/{id}', [CouponController::class, 'showEditCoupon'])->name('edit.coupon.show');
    Route::post('/coupon/edit/{id}', [CouponController::class, 'submitEditCoupon'])->name('edit.coupon.submit');
    Route::get('/coupon/delete/{id}', [CouponController::class, 'deleteCoupon'])->name('delete.coupon');
    Route::get('/coupon/{id}/{status}', [CouponController::class, 'updateCouponStatus'])->name('update.coupon.status');

    //ORDER ROUTES
    Route::get('/orders', [OrderController::class, 'showAllOrders'])->name('show.all.orders');
    Route::post('/orders/status', [OrderController::class, 'updateOrderStatus'])->name('update.order.status');

    //OFFER ROUTES
    Route::get('/offers', [OfferController::class, 'showOffers'])->name('show.offers');
    Route::post('/orders/add', [OfferController::class, 'store'])->name('offer.store');
    Route::get('/offer/edit/{id}', [OfferController::class, 'showEditOffer'])->name('show.edit.offer');
    Route::post('/offer/edit/{id}', [OfferController::class, 'submitEditOffer'])->name('submit.edit.offer');
    Route::get('/offer/delete/{id}', [OfferController::class, 'deleteOffer'])->name('delete.offer');
    Route::get('/offer/{id}/{status}', [OfferController::class, 'updateOfferStatus']);
    Route::post('/product/offer', [OfferController::class, 'storeAddOfferProducts'])->name('store.add.offer.products');
    Route::get('/offer-products/{id}', [OfferController::class, 'viewOfferProducts'])->name('view.offer.products');
    Route::get('/offer-products/delete/{id}', [OfferController::class, 'deleteOfferProduct'])->name('delete.offer.product');

    //BLOG POST ROUTES
    Route::get('/posts', [PostController::class, 'showPost'])->name('post.show');
    Route::get('/post/add-post', [PostController::class, 'showAddPost'])->name('add.post.show');
    Route::post('/post/add-post', [PostController::class, 'submitAddPost'])->name('add.post.submit');
    Route::get('/post/edit-post/{id}', [PostController::class, 'showEditPost'])->name('edit.post.show');
    Route::post('/post/edit-post/{id}', [PostController::class, 'submitEditPost'])->name('edit.post.submit');
    Route::get('/post/delete-post/{id}', [PostController::class, 'deletePost'])->name('delete.post');
    Route::get('/post/{id}/{status}', [PostController::class, 'updatePostStatus'])->name('update.post.status');


});


//******************************USER RESISTER & LOGIN**************************************
Route::get('/create-account', [UserController::class, 'showRegisterForm'])->name('user.register.show');
Route::post('/create-account', [UserController::class, 'submitRegisterForm'])->name('user.register.submit');
Route::get('/login', [UserAuthController::class, 'showLoginForm'])->name('user.login.show');
Route::post('/login', [UserAuthController::class, 'submitLoginForm'])->name('user.login.submit');
Route::get('/logout', [UserAuthController::class, 'userLogout'])->name('user.logout');
Route::get('/forget-password', [PasswordResetController::class, 'showForgetPasswordForm'])->name('forget.password.show');
Route::post('/forget-password', [PasswordResetController::class, 'submitForgetPasswordForm'])->name('forget.password.submit');
Route::get('/reset-password/{email}/{token}', [PasswordResetController::class, 'showResetPasswordForm'])->name('reset.password.show');
Route::post('/reset-password/{email}/{token}', [PasswordResetController::class, 'submitResetPasswordForm'])->name('reset.password.submit');

//USER PROFILE
Route::middleware(['user.auth'])->group(function () {
    //USER PROFILE
    Route::get('/profile', [UserProfileController::class, 'showProfile'])->name('user.profile.show');
    Route::get('/profile-update', [UserProfileController::class, 'showUpdateProfile'])->name('user.profile.update.show');
    Route::post('/profile-update', [UserProfileController::class, 'submitUpdateProfile'])->name('user.profile.update.submit');
    //CHECKOUT
    Route::get('/checkout', [CheckoutController::class, 'showCheckout'])->name('page.checkout');
    Route::post('/place-order', [CheckoutController::class, 'placeOrder'])->name('place.order');
    Route::get('/order-success', [CheckoutController::class, 'orderSuccess'])->name('order.success');
    Route::get('/track-order', [CheckoutController::class, 'trackOrder'])->name('track.order');


});


// ******************************FRONTEND ROUTES******************************

//HOME PAGE
Route::get('/', [HomeController::class, 'home'])->name('page.home');
//SHOP PAGE
Route::get('/shop', [ShopController::class, 'shop'])->name('page.shop');
//CATEGORY-WISE PRODUCT
Route::get('/category/{id}', [ShopController::class, 'categoryWiseProduct'])->name('category.wise.product');
//SINGLE PRODUCT PAGE
Route::get('/product/{id}', [ShopController::class, 'productDetails'])->name('product.details');
//FEATURED PRODUCT PAGE
Route::get('/products/featured', [ShopController::class, 'showFeaturedProducts'])->name('page.featured.products');
//SHOPPING CART
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::get('/shopping-cart', [CartController::class, 'showCart'])->name('page.shopping.cart');
Route::get('/cart-delete/{id}', [CartController::class, 'deleteCart'])->name('cart.delete');
Route::get('/cart/item-increment/{id}', [CartController::class, 'incrementQuantity'])->name('cart.item.increment');
Route::get('/cart/item-decrement/{id}', [CartController::class, 'decrementQuantity'])->name('cart.item.decrement');
Route::post('/apply-coupon', [CouponController::class, 'applyCoupon'])->name('apply.coupon');
Route::get('/coupon-delete', [CouponController::class, 'destroyCoupon'])->name('coupon.destroy');

