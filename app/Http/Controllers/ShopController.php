<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;

class ShopController extends Controller
{
    public function shop()
    {
        $categories = Category::where('status', 'active')->latest()->get();
        $subcategories = SubCategory::where('status', 'active')->latest()->get();
        $brands = Brand::all();
        $products = Product::with('images')->get();

        return view('frontend.shop', compact(['categories', 'subcategories', 'brands', 'products']));
    }

     //PRODUCT DETAILS
    public function productDetails($id)
    {
        $product = Product::with('images')->where('id', $id)->first();
        return view('admin.products.view-product', compact(['product']));
    }

    //CATEGORY-WISE PRODUCT
    public function categoryWiseProduct($id)
    {
        $products = Product::where('sub_cat_id', $id)->get();
        return view('frontend.shop-by-category', compact(['products']));
    }

    //FEATURED PRODUCTS
    public function showFeaturedProducts()
    {
        $products = Product::where('featured_product', 'yes')->latest()->get();
        return view('frontend.featured-products', compact(['products']));
    }

    //HOT DEALS PRODUCTS
    // public function showHotDealsProducts()
    // {
    //     $products = Product::with('offers')->where('id', 2)->get();
    //     return view('frontend.featured-products', compact(['products']));
    // }
 


}
