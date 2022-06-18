@extends('layouts.admin-master')
@section('page-title', 'Add Product')

@section('content')

    <div class="py-4 px-5 my-2">
        <div class="row">
            <div class="col-12 py-4 bg-white">
                <h4 class="px-4 mt-2">Add New Product</h4>

                {{-- ------------------------------------------------------
                    *
                    * FORM LAYOUT STYLE-02
                    *
                -------------------------------------------------------- --}}
                <div class="card px-4 py-3">
                    <div class="form-layout">
                        <form action="{{ route('add.product.submit') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @if (session('create-message'))
                                <h3 class="text-info text-center py-2">{{ session('create-message') }}</h3>
                            @endif

                            <div class="row mg-b-25">
                                <div class="col-lg-8 mb-2">
                                    <div class="form-group">
                                        <label class="form-control-label">Product Name: <small
                                                class="tx-danger">(required)</small></label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name">
                                        @error('name')
                                            <span class="text-danger fst-italic">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-2">
                                    <div class="form-group">
                                        <label class="form-control-label">Product Code: <small
                                                class="tx-danger">(required)</small></label>
                                        <input type="text" class="form-control @error('code') is-invalid @enderror"
                                            name="code">
                                        @error('code')
                                            <span class="text-danger fst-italic">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-2">
                                    <div class="form-group">
                                        <label class="form-control-label">Regular Price: <small class="tx-danger">
                                                (required)</small></label>
                                        <input class="form-control @error('regular_price') is-invalid @enderror"
                                            type="number" name="regular_price" min="0" step="any">
                                        @error('regular_price')
                                            <span class="text-danger fst-italic">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-2">
                                    <div class="form-group">
                                        <label class="form-control-label">Sale Price: <small class="tx-info">
                                                (optional)</small></label>
                                        <input class="form-control @error('sale_price') is-invalid @enderror" type="number"
                                            name="sale_price" min="0" step="any">
                                        @error('sale_price')
                                            <span class="text-danger fst-italic">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-2">
                                    <div class="form-group">
                                        <label class="form-control-label">Stock Quantity: <small
                                                class="tx-info">
                                                (optional)</small></label>
                                        <input class="form-control @error('quantity') is-invalid @enderror" type="number"
                                            name="quantity">
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-2">
                                    <div class="form-group">
                                        <label class="form-control-label">Product Description: <small
                                                class="tx-danger">(required) </small> </label>
                                        <textarea class="@error('description') is-invalid @enderror" name="description" id="summernote"> </textarea>
                                        @error('description')
                                            <span class="text-danger fst-italic">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <div class="form-group mg-b-10-force">
                                        <label class="form-control-label">Product Category: <small
                                                class="tx-danger">(required)</small></label>
                                        <select name="category_id"
                                            class="form-control select2 @error('category_id') is-invalid @enderror"
                                            data-placeholder="Choose Category">
                                            <option label="Choose Category"></option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="text-danger fst-italic">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <div class="form-group mg-b-10-force">
                                        <label class="form-control-label">Product Sub-Category: <small
                                                class="tx-info">(optional)</small></label>
                                        <select name="subCat_id"
                                            class="form-control select2 @error('subCat_id') is-invalid @enderror"
                                            data-placeholder="Choose Category">
                                            <option label="Choose Sub-Category"></option>
                                            @foreach ($subcategories as $subcategory)
                                                <option value="{{ $subcategory->id }}">
                                                    {{ $subcategory->sub_category_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('subCat_id')
                                            <span class="text-danger fst-italic">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <div class="form-group mg-b-10-force">
                                        <label class="form-control-label">Product Brand: <small
                                                class="tx-info">(optional)</small></label>
                                        <select class="form-control select2 @error('brand_id') is-invalid @enderror"
                                            name="brand_id">
                                            <option label="Choose brand"></option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
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

                                        {{-- <div class="row mb-2">
                                            <div class="col-md-2">
                                                <label class="form-control-label">Available Size:</label>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="ckbox">
                                                    <input type="checkbox" name="sizes[]" value="XXL">
                                                    <span>XXL</span>
                                                </label>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="ckbox">
                                                    <input type="checkbox" name="sizes[]" value="XL">
                                                    <span>XL</span>
                                                </label>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="ckbox">
                                                    <input type="checkbox" name="sizes[]" value="L">
                                                    <span>L</span>
                                                </label>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="ckbox">
                                                    <input type="checkbox" name="sizes[]" value="M">
                                                    <span>M</span>
                                                </label>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="ckbox">
                                                    <input type="checkbox" name="sizes[]" value="S">
                                                    <span>S</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-2">
                                                <label class="form-control-label">Available Color:</label>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="ckbox">
                                                            <input type="checkbox" name="colors[]" value="Black">
                                                            <span>Black</span>
                                                        </label>
                                                        <label class="ckbox">
                                                            <input type="checkbox" name="colors[]" value="White">
                                                            <span>White</span>
                                                        </label>
                                                        <label class="ckbox">
                                                            <input type="checkbox" name="colors[]" value="Yellow">
                                                            <span>Yellow</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="ckbox">
                                                            <input type="checkbox" name="colors[]" value="Red">
                                                            <span>Red</span>
                                                        </label>
                                                        <label class="ckbox">
                                                            <input type="checkbox" name="colors[]" value="Green">
                                                            <span>Green</span>
                                                        </label>
                                                        <label class="ckbox">
                                                            <input type="checkbox" name="colors[]" value="Blue">
                                                            <span>Blue</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="ckbox">
                                                            <input type="checkbox" name="colors[]" value="Orange">
                                                            <span>Orange</span>
                                                        </label>
                                                        <label class="ckbox">
                                                            <input type="checkbox" name="colors[]" value="Brown">
                                                            <span>Brown</span>
                                                        </label>
                                                        <label class="ckbox">
                                                            <input type="checkbox" name="colors[]" value="Pink">
                                                            <span>Pink</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="ckbox">
                                                            <input type="checkbox" name="colors[]" value="Grey">
                                                            <span>Grey</span>
                                                        </label>
                                                        <label class="ckbox">
                                                            <input type="checkbox" name="colors[]" value="Aqua">
                                                            <span>Aqua</span>
                                                        </label>
                                                        <label class="ckbox">
                                                            <input type="checkbox" name="colors[]" value="Violet">
                                                            <span>Violet</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-2">
                                                <label class="form-control-label">Product Weight (kg):</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input class="form-control @error('weight') is-invalid @enderror"
                                                    type="text" name="weight">
                                            </div>
                                        </div> --}}

                                    </div>
                                </div>
                                <div class="col-lg-12 mb-2">
                                    <div class="form-group">
                                        <label class="form-control-label">Product Short Description: <small
                                                class="tx-info"> (optional)</small></label>
                                        <textarea class="@error('short_description') is-invalid @enderror" name="short_description"
                                            id="summernote2"></textarea>
                                        @error('short_description')
                                            <span class="text-danger fst-italic">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Product Thumbnail: <small
                                                class="tx-danger">(required)</small></label>
                                        <input type="file" class="form-control @error('thumbnail') is-invalid @enderror"
                                            name="thumbnail">
                                        @error('thumbnail')
                                            <span class="text-danger fst-italic">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Product Gallery: <small
                                                class="tx-info">(optional)</small></label>
                                        <input type="file" class="form-control @error('gallery') is-invalid @enderror"
                                            name="gallery[]" multiple>
                                        @error('gallery')
                                            <span class="text-danger fst-italic">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="form-layout-footer">
                                <button type="submit" name="submit" class="btn btn-info mg-r-5">Add Product</button>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- ------------------------------------------------------
                    *
                    * FORM LAYOUT STYLE-02 END
                    *
                -------------------------------------------------------- --}}
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
