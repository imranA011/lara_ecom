<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //SHOW CREATE CATEGORY
    public function showAddCategory()
    {
        return view('admin.categories.add-category');
    }

    //SAVE CREATE CATEGORY
    public function submitAddCategory()
    {
        request()->validate([
            'category_name' => 'required|unique:categories,category_name'
        ]);

        try {
            Category::create([
                'category_name' => request('category_name')
            ]);
            return redirect()->back()->with('create-message', 'New Category Created');
        } catch (Exception $e) {
            return redirect()->back()->with('create-message', 'Category already exists') . $e;
        }
    }

    //SHOW ALL CATEGORIES
    public function showCategory()
    {
        $categories = Category::all();
        return view('admin.categories.show-category', compact('categories'));
    }

    //SHOW EDIT CATEGORY
    public function showEditCategory($id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit-category', compact('category'));
    }

    //SAVE EDIT CATEGORY
    public function submitEditCategory($id)
    {
        $category = Category::find($id);
        request()->validate([
            'category_name' => 'required|unique:categories,category_name'
        ]);

        $category->update([
            'category_name' => request('category_name')
        ]);
        return redirect()->route('category.show')->with('update-message', 'Category updated successfully');
    }

    //DELETE CATEGORY
    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->back()->with('delete-message', 'Category deleted successfully');
    }

    //UPDATE ACTIVE CATEGORY
    public function activeCategory($id)
    {
        Category::find($id)->update([
            'status' => 'active'
        ]);
        return redirect()->back()->with('status-message', 'Category Activated Successfully');
    }

    //UPDATE INACTIVE CATEGORY
    public function inactiveCategory($id)
    {
        Category::find($id)->update([
            'status' => 'inactive'
        ]);
        return redirect()->back()->with('status-message', 'Category Inactivated Successfully');
    }



}
