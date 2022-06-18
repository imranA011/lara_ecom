@extends('layouts.admin-master')
@section('page-title', 'Edit Product')

@section('content')

<div class="py-4 px-5 my-2">
    <div class="row">
        <div class="col-12 bg-light p-4">
            <h4 class="py-2 mb-3 px-2">Edit Product</h4>

                {{--------------------------------------------------------
                    *
                    *  FORM LAYOUT
                    *
                ----------------------------------------------------------}}
                <div class="card px-2">
                    <div class="form-layout">
                        <form action="{{ route('edit.product.submit', $product->id)}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="row mg-b-25">
                                <div class="col-lg-8 mb-2">
                                    <div class="form-group">
                                        <label class="form-control-label">Product Name: <small class="tx-danger">(required)</small></label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $product->name }}">
                                        @error('name')
                                            <span class="text-danger fst-italic">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-2">
                                    <div class="form-group">
                                        <label class="form-control-label">Product Code: <small class="tx-danger">(required)</small></label>
                                        <input type="text" class="form-control @error('code') is-invalid @enderror"
                                            name="code" value="{{ $product->code}}">
                                        @error('code')
                                            <span class="text-danger fst-italic">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-2">
                                    <div class="form-group">
                                        <label class="form-control-label">Regular Price: <small class="tx-danger"> (required)</small></label>
                                        <input class="form-control @error('regular_price') is-invalid @enderror" type="number" name="regular_price" min="0" step="any" value="{{ $product->regular_price }}">
                                        @error('regular_price')
                                            <span class="text-danger fst-italic">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-2">
                                    <div class="form-group">
                                        <label class="form-control-label">Sale Price: <small class="tx-info"> (optional)</small></label>
                                        <input class="form-control @error('sale_price') is-invalid @enderror" type="number" name="sale_price" min="0" step="any" value="{{ $product->sale_price }}">
                                        @error('sale_price')
                                            <span class="text-danger fst-italic">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-2">
                                    <div class="form-group">
                                        <label class="form-control-label">Stock Quantity: <small class="tx-info"> (optional)</small></label>
                                        <input class="form-control @error('quantity') is-invalid @enderror" type="number" name="quantity" value="{{ $product->quantity }}">
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-2">
                                    <div class="form-group">
                                        <label class="form-control-label">Product Description: <small class="tx-danger">(required) </small> </label>
                                        <textarea class="@error('description') is-invalid @enderror" name="description" id="summernote"> {{ $product->description }} </textarea>
                                        @error('description')
                                            <span class="text-danger fst-italic">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <div class="form-group mg-b-10-force">
                                        <label class="form-control-label">Product Category: <small class="tx-danger">(required)</small></label>
                                        <select name="category_id" class="form-control select2 @error('category_id') is-invalid @enderror" data-placeholder="Choose Category">
                                            <option label="Choose Category"></option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" {{ $product->category_id == $category->id  ? 'selected' : '' }}>{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="text-danger fst-italic">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <div class="form-group mg-b-10-force">
                                        <label class="form-control-label">Product Sub-Category: <small class="tx-info">(optional)</small></label>
                                        <select name="subCat_id" class="form-control select2 @error('subCat_id') is-invalid @enderror" data-placeholder="Choose Category">
                                            <option label="Choose Sub-Category"></option>
                                            @foreach ($subcategories as $subcategory)
                                                <option value="{{ $subcategory->id }}" {{ $product->sub_cat_id == $subcategory->id  ? 'selected' : '' }}>{{ $subcategory->sub_category_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('subCat_id')
                                            <span class="text-danger fst-italic">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <div class="form-group mg-b-10-force">
                                        <label class="form-control-label">Product Brand: <small class="tx-info">(optional)</small></label>
                                        <select class="form-control select2 @error('brand_id') is-invalid @enderror" name="brand_id">
                                            <option label="Choose brand"></option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}" {{ $product->brand_id == $brand->id  ? 'selected' : '' }}>{{ $brand->brand_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12 mb-2">
                                    <label class="ckbox mb-3">
                                        <input type="checkbox" name="addProductAttributes" id="addProductAttributes">
                                        <span>Add Product Attributes?</span>
                                        <small class="tx-info">(optional) </small>
                                    </label>
                                    <div id="productAttributeItems">

                                        @foreach ( $attributes as $attribute )
                                        <div class="row mb-2">
                                            <div class="col-md-2">
                                                <label class="form-control-label">Available {{ ucfirst($attribute->attribute_name) }}:</label>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    @php($attributeItems = App\Models\AttributeItem::where('attribute_id', $attribute->id)->get())
                                                    @foreach ( $attributeItems as $item )
                                                    <div class="col-md-3">
                                                        <label class="ckbox">
                                                            <input type="checkbox" name="items[]" value="{{$item->id}}">
                                                            <span>{{ ucfirst($item->item_name) }}</span>
                                                        </label>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>

                                <div class="col-lg-12 mb-2">
                                    <div class="form-group">
                                        <label class="form-control-label">Product Short Description: <small class="tx-info"> (optional)</small></label>
                                        <textarea class="@error('short_description') is-invalid @enderror" name="short_description" id="summernote2"> {{ $product->short_description }} </textarea>
                                        @error('short_description')
                                            <span class="text-danger fst-italic">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Product Thumbnail: <small class="tx-danger">(required)</small></label>
                                        <input type="file" class="mb-3 form-control @error('thumbnail') is-invalid @enderror" name="thumbnail">
                                        <input type="hidden" class="mb-2" name="old_thumbnail"  value="{{ $product->product_thumbnail}}">
                                        <img width="200px" height="200px" src="{{ asset('uploads/products/thumbnail').'/'.$product->product_thumbnail }}" alt="">
                                        @error('thumbnail')
                                            <span class="text-danger fst-italic">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Product Gallery: <small class="tx-info">(optional)</small></label>
                                        <input type="file" class="mb-3 form-control @error('gallery') is-invalid @enderror" name="gallery[]" multiple>
                                        @if ( count($product->images)> 0 )
                                        @foreach ($product->images as $images)
                                        <div class="d-inline-flex justify-content-start align-items-start border border-primary">
                                            <img width="70px" height="70px" src="{{ asset('uploads/products/gallery').'/'.$images->product_gallery }}" alt="">
                                            <a class="btn btn-sm text-danger" onclick="return confirm('Sure?')" href="{{ route('delete.gallery.image', $images->id) }}">X</a>
                                        </div>
                                        @endforeach
                                        @endif
                                        <br>
                                        @error('gallery')
                                            <span class="text-danger fst-italic">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    @if (session('error-message'))
                                        <span class="text-danger text-center mb-3">{{ session('error-message') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-layout-footer mb-3">
                                <button type="submit" name="submit" class="btn btn-info mg-r-5">Update </button>
                                <button type="submit" name="submit" class="btn btn-danger mg-r-5">Cancel </button>
                            </div>
                        </form>
                    </div>
                </div>
               {{--------------------------------------------------------
                    *
                    *  FORM LAYOUT END
                    *
                ----------------------------------------------------------}}

        </div>
    </div>
</div>

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $("#addProductAttributes").change(function() {
                if ($(this).prop('checked')) {
                    $("#productAttributeItems").show();
                } else {
                    $("#productAttributeItems").hide();
                }
            });

        });
    </script>
@endpush

