<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $categories = Category::with('subCategories')->has('subCategories')->where('status', 'active')->get();
        $subcategories = SubCategory::where('status', 'active')->get();
        $brands = Brand::all();
        $products = Product::all();
        $f_products = Product::where('featured_product', 'yes')->latest()->get();
        $sell_products = Product::where('sale_price', '!=', 'null')->latest()->get();
        $new_products = Product::inRandomOrder()->get();
        $new_arrival =  Product::latest()->get();
        $hot_products = Product::latest()->get();
        $sp_offer_products = Product::latest()->get();
        $sp_deal_products = Product::inRandomOrder()->get();
        $sliders = Slider::all();
        $banners = Banner::all();
        $posts = Post::all();
        return view('frontend.home', compact(['categories', 'subcategories', 'brands', 'products', 'f_products', 'sell_products', 'new_products', 'hot_products', 'sp_offer_products', 'sp_deal_products', 'new_arrival', 'sliders', 'banners', 'posts']));
    }





}
