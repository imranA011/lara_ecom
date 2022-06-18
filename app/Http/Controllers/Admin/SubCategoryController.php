<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Exception;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    //SHOW CREATE SUB-CATEGORY
    public function showAddSubCategory()
    {
        return view('admin.categories.add-subCat');
    }

    //SAVE CREATE SUB-CATEGORY
    public function submitAddSubCategory()
    {

        request()->validate([
            'category_id'  => 'required',
            'subCat_name'  => 'required|unique:sub_categories,sub_category_name',
        ],
        [
            'category_id.required' => 'Select A Category Name',
            'subCat_name.required' => 'The Sub Category Name Field Is Required',
            'subCat_name.unique'   => 'The Sub Category Name Has Been Already Taken',
        ]);

        try {
            SubCategory::create([
                'category_id'       => request('category_id'),
                'sub_category_name' => request('subCat_name')
            ]);
            return redirect()->back()->with('create-message', 'New Sub Category Created');
        } catch (Exception $e) {
            return redirect()->back()->with('create-message', 'Sub Category already exists') . $e;
        }
    }

    //SHOW ALL CATEGORIES
    public function showSubCategory()
    {
        $subcategories = SubCategory::with('category')->get();
        return view('admin.categories.show-subCat', compact('subcategories'));
    }

    // SHOW EDIT SUB-CATEGORY
    public function showEditSubCategory($id)
    {
        $subcategory = SubCategory::with('category')->find($id);
        return view('admin.categories.edit-subCat', compact('subcategory'));
    }

    // SAVE EDIT SUB-CATEGORY
    public function submitEditSubCategory($id)
    {
        $subcategory = SubCategory::find($id);
        request()->validate([
            'category_id'  => 'required',
            'subCat_name'  => 'required|unique:sub_categories,sub_category_name',
        ],
        [
            'category_id.required' => 'Select A Category Name',
            'subCat_name.required' => 'The Sub Category Name Field Is Required',
            'subCat_name.unique'   => 'The Sub Category Name Has Been Already Taken',
        ]);

        $subcategory->update([
            'category_id'       => request('category_id'),
            'sub_category_name' => request('subCat_name')
        ]);
        return redirect()->route('sub.category.show')->with('update-message', 'Sub-Category updated successfully');

    }

    //DELETE SUB-CATEGORY
    public function deleteSubCategory($id)
    {
        $subcategory = SubCategory::find($id);
        $subcategory->delete();
        return redirect()->back()->with('delete-message', 'Sub-Category deleted');
    }

    //UPDATE SUB-CATEGORY STATUS
    public function updateSubCategoryStatus($id, $status)
    {
        if($id != null && $status != null)
        {
            $subcategory = SubCategory::find($id);
            if($subcategory != NULL)
            {
                $subcategory->update([
                    'status' => $status,
                ]);
                return redirect()->back()->with('status-message', 'SubCategory successfully '. $status);
            }
            else
            {
                return 'No Brand Found';
            }
        }
        else
        {
            return " Invalid Sub-Category";
        }
    }


}

