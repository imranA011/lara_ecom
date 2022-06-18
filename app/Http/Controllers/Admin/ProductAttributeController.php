<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProductAttribute;
use App\Models\AttributeItem;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductAttributeController extends Controller
{
    //SHOW ALL PRODUCT ATTRIBUTES
    public function showProductAttributes()
    {
        $productAttributes = ProductAttribute::with('items')->get();
        return view('admin.product-attributes.index', compact('productAttributes'));
    }

    //STORE PRODUCT ATTRIBUTE
    public function storeProductAttributes()
    {
        request()->validate([
            'attribute_name'     => 'required',
        ]);

        ProductAttribute::create([
            'attribute_name'        => request('attribute_name'),
        ]);


        return redirect()->back()->with('create-message', 'New Attribute Created');
    }

    //SHOW EDIT PRODUCT ATTRIBUTE
    public function showEditProductAttribute($id)
    {
        $productAttribute = ProductAttribute::with('items')->find($id);
        return view('admin.product-attributes.edit', compact('productAttribute'));
    }

    //SAVE EDIT PRODUCT ATTRIBUTE
    public function submitEditProductAttribute($id)
    {
        $productAttribute = ProductAttribute::find($id);
        request()->validate([
            'attribute_name'     => 'required',
        ]);

        $productAttribute->update([
            'attribute_name'        => request('attribute_name'),
        ]);
        return redirect()->route('show.product.attributes')->with('update-message', 'Product Attribute updated successfully');
    }

    //DELETE PRODUCT ATTRIBUTE
    public function deleteProductAttribute($id)
    {
        $productAttribute = ProductAttribute::with('items')->findOrFail($id);
        $productAttribute->items()->delete();
        $productAttribute->delete();
        return redirect()->back()->with('delete-message', 'Product Attribute deleted');
    }

    //SHOW ALL ATTRIBUTE ITEMS
    public function showAttributeItems($id)
    {
        $attributeItem = ProductAttribute::find($id);
        $itemLists = AttributeItem::where('attribute_id', $attributeItem->id)->get();
        return view('admin.product-attributes.add-item', compact(['attributeItem', 'itemLists']));
    }

    //STORE ATTRIBUTE ITEM
    public function storeAttributeItem($id)
    {
        $attributeItem = ProductAttribute::find($id);
        request()->validate([
            'item_name'     => 'required',
        ],
        [
            'item_name.required'  => 'Select a new Color',
        ]);

        AttributeItem::create([
            'attribute_id' => $attributeItem->id,
            'item_name' => request('item_name'),
        ]);

        return redirect()->back()->with('create-message', 'New '. $attributeItem->attribute_name . ' created');
    }

    //DELETE ATTRIBUTE ITEM
    public function deleteAttributeItem($id)
    {
        $attributeItem = AttributeItem::find($id);
        $attributeItem->delete();
        return redirect()->back()->with('delete-message', $attributeItem->item_name.' deleted');
    }




}
