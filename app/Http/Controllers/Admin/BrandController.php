<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Exception;
use Illuminate\Http\Request;

class BrandController extends Controller
{
     //SHOW CREATE BRAND
     public function showAddBrand()
     {
         return view('admin.brands.add-brand');
     }

     //SAVE CREATE BRAND
     public function submitAddBrand()
     {
         request()->validate([
             'brand_name' => 'required|unique:brands,brand_name'
         ]);

         try {
             Brand::create([
                 'brand_name' => request('brand_name')
             ]);
             return redirect()->back()->with('create-message', 'New Brand Created');
         } catch (Exception $e) {
             return redirect()->back()->with('create-message', 'Brand already exists') . $e;
         }
     }

     //SHOW ALL BRANDS
     public function showBrand()
     {
         $brands = Brand::all();
         return view('admin.brands.show-brand', compact('brands'));
     }

     //SHOW UPDATE BRAND
     public function showUpdateBrand($id)
     {
         $brand = Brand::find($id);
         return view('admin.brands.update-brand', compact('brand'));
     }

     //SAVE UPDATE BRAND
     public function submitUpdateBrand($id)
     {
         $brand = Brand::find($id);
         request()->validate([
             'brand_name' => 'required|unique:brands,brand_name'
         ]);

         $brand->update([
             'brand_name' => request('brand_name')
         ]);
         return redirect()->route('brand.show')->with('update-message', 'Brand updated successfully');
     }

     //DELETE BRAND
     public function deleteBrand($id)
     {
         $brand = Brand::find($id);
         $brand->delete();
         return redirect()->back()->with('delete-message', 'Brand deleted successfully');
     }


    // UPDATE BRAND STATUS
     public function updateBrandStatus($id, $status)
     {
         if($id != null && $status != null){

             $brand = Brand::find($id);

             if($brand != NULL){

                 $brand->update([
                     'status' => $status,
                 ]);
                 return redirect()->back()->with('status-message', 'Brand successfully '. $status);

             }else{
                 return 'No Brand Found';
             }

         }else{
             return 'Invalid Brand';
         }
     }
}
