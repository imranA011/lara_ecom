<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Offer;
use App\Models\Category;
use App\Models\ProductImage;
use App\Models\ProductAttribute;
use App\Models\AttributeItem;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    //SHOW CREATE PRODUCT
    public function showAddProduct()
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $brands = Brand::all();
        $attributes = ProductAttribute::all();
        $offers = Offer::all();
        return view('admin.products.add-product', compact(['categories', 'subcategories', 'brands', 'attributes',  'offers']));
    }

    //SAVE CREATE PRODUCT
    public function submitAddProduct()
    {
        request()->validate([
            'name'              => 'required',
            'code'              => 'required',
            'description'       => 'required',
            'regular_price'     => 'required',
            'thumbnail'         => 'required|image|mimes:jpg,png,jpeg',
            'category_id'       => 'required',
        ],
        [
            'category_id.required'  => 'Select A Category Name',
        ]);

        if (request()->hasFile('thumbnail'))
        {
            $thumb = request('thumbnail');
            $new_thumb = rand() . '.' . $thumb->extension();
            $product = Product::create([
                'name'              => request('name'),
                'code'              => request('code'),
                'description'       => request('description'),
                'regular_price'     => request('regular_price'),
                'sale_price'        => request('sale_price'),
                'quantity'          => request('quantity') ? request('quantity') : 1,
                'short_description' => request('short_description'),
                'product_thumbnail' => $new_thumb,
                'category_id'       => request('category_id'),
                'sub_cat_id'        => request('subCat_id'),
                'brand_id'          => request('brand_id'),
            ]);
            $thumb->move('uploads/products/thumbnail',  $new_thumb);
        }

        if(request()->has('addProductAttributes'))
        {
            $items = request('items');
            foreach($items as $item)
            {
                $product-> attributeItems()->attach($item);
            }
        }

        if (request()->hasFile('gallery'))
        {
            foreach( request('gallery') as $image)
            {
                $new_image = rand() . '.' . $image->extension();
                $product->images()->create([
                    'product_gallery'   => $new_image,
                ]);
                $image->move('uploads/products/gallery',  $new_image);
            }
        }
        return redirect()->back()->with('create-message', 'Product Added');
    }

    //SHOW ALL PRODUCTS
    public function showProduct()
    {
        $products = Product::with('images')->get();
        $offers = Offer::all();
        return view('admin.products.show-products', compact(['products', 'offers']));
    }

    //SHOW UPDATE PRODUCT
    public function showEditProduct($id)
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $brands = Brand::all();
        $product = Product::find($id);
        $attributes = ProductAttribute::all();
        return view('admin.products.edit-product', compact(['product', 'attributes', 'categories', 'subcategories', 'brands']));
    }

    //SAVE UPDATE PRODUCT
    public function submitEditProduct($id)
    {
        $product = Product::with('images')->find($id);

        $old_thumbnail = request('old_thumbnail');
        $new_thumbnail = request('thumbnail');

        if($new_thumbnail != null)
        {
            request()->validate([
                'name'              => 'required',
                'code'              => 'required',
                'description'       => 'required',
                'regular_price'     => 'required',
                'thumbnail'         => 'required|image|mimes:jpg,png,jpeg',
                'category_id'       => 'required'
            ]);
            $new_thumbnail_name = rand(). '.' .  $new_thumbnail->extension();
            request('thumbnail')->move('uploads/products/thumbnail',  $new_thumbnail_name);
            $thumbnail_path = 'uploads/products/thumbnail/'. $old_thumbnail;
            unlink($thumbnail_path);
        }
        else
        {
            request()->validate([
                'name'              => 'required',
                'code'              => 'required',
                'description'       => 'required',
                'regular_price'     => 'required',
                'category_id'       => 'required'
            ]);
            $new_thumbnail_name = $old_thumbnail;
        }

        $product->update([
            'name'              => request('name'),
            'code'              => request('code'),
            'description'       => request('description'),
            'quantity'          => request('quantity'),
            'regular_price'     => request('regular_price'),
            'sale_price'        => request('sale_price'),
            'short_description' => request('short_description'),
            'product_thumbnail' => $new_thumbnail_name,
            'category_id'       => request('category_id'),
            'sub_cat_id'        => request('subCat_id'),
            'brand_id'          => request('brand_id')
        ]);

        if(request()->has('addProductAttributes'))
        {
            $old_items = AttributeItem::all();
            $product-> attributeItems()->detach($old_items);
            $items = request('items');
            if( $items != null)
            {
                foreach($items as $item)
                {
                    $product-> attributeItems()->attach($item);
                }
            }
            else
            {
                $product-> attributeItems()->detach($items);
            }

        }

        if(request()->hasFile("gallery")){
            $files = request()->file("gallery");
            foreach($files as $file)
            {
                $extension = $file->getClientOriginalExtension();
                if ($extension == 'jpg' || $extension == 'png' || $extension == 'jpeg')
                {
                    $imageName = rand(). '.'.$extension;
                    $request["product_id"] = $id;
                    $request["product_gallery"] = $imageName;
                    ProductImage::create([
                        'product_id' => $id,
                        'product_gallery' => $imageName,
                    ]) ;
                    $file->move('uploads/products/gallery/', $imageName);
                }
                else
                {
                    return redirect()->back()->with('error-message','Enter valid image format (jpg, png or jpeg)');
                }
            }
        }
        return redirect()->route('product.show')->with('update-message', 'Product Updated');
    }

    //DELETE PRODUCT
    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);

        if (File::exists("uploads/products/thumbnail/".$product->product_thumbnail)) {
            File::delete("uploads/products/thumbnail/".$product->product_thumbnail);
        }
        $images = ProductImage::where("product_id", $product->id)->get();
        foreach($images as $image){
            if (File::exists("uploads/products/gallery/".$image->product_gallery)) {
                File::delete("uploads/products/gallery/".$image->product_gallery);
            }
        }
        $product->delete();

        return redirect()->back()->with('delete-message', 'Product deleted');
    }

    //DELETE GALLERY PRODUCT
    public function deleteImage($id){
        $image = ProductImage::findOrFail($id);
        if (File::exists("uploads/products/gallery/".$image->product_gallery)) {
            File::delete("uploads/products/gallery/".$image->product_gallery);
        }
        ProductImage::find($id)->delete();
        return redirect()->back();
    }

    //VIEW SINGLE PRODUCT
    public function viewProduct($id)
    {
        $product = Product::with('images')->find($id);
        return view('admin.products.view-product', compact('product'));
    }

    //UPDATE FEATURED PRODUCT STATUS
    public function updateFeaturedStatus($id, $status)
    {
        $product = Product::find($id);
        $product->featured_product = $status;
        $product->update();
        return response()->json(['message' => 'success']);
    }

    



}
