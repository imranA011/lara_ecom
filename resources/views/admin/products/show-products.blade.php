@extends('layouts.admin-master')
@section('page-title', 'All Products')

@section('content')
<div class="py-4 px-5 my-2">
    <div class="row">
        <div class="col-12 mx-auto bg-light p-4" style="overflow-x:auto;">
            <h4 class="py-2 mb-3">All Products</h4>

            @if (session('update-message'))
                <h3 class="text-success text-center mb-4">{{ session('update-message') }}</h3>
            @endif
            @if (session('delete-message'))
                <h3 class="text-danger text-center mb-4">{{ session('delete-message') }}</h3>
            @endif

            <table class="table table-hover" >
                <form action="{{ route('store.add.offer.products') }}" method="post">
                    @csrf
                    <div class="mb-2">
                        <div class=row>
                            <div class="col-lg-6 py-2">
                                <select style="padding:6px;" name="promotional_offers" id="">
                                    <option label="Select Promotional Offer"></option>
                                    @foreach ( $offers as $offer )
                                    <option name="offer_products[]" value="{{$offer->id}}">{{ucwords($offer->offer_name)}}</option>
                                    @endforeach
                                </select>
                                <input type="submit" name="submit" value="Apply"
                                    style="width:80px; margin-bottom:1px; padding:5px 0" class="btn btn-sm btn-primary rounded">
                            </div>
                        </div>
                        @if (session('offer-message'))
                            <small class="text-danger mb-3 pt-0">{{ session('offer-message') }}</small>
                        @endif
                    </div>
                    <thead>
                        <tr>
                            <th class="wd-10">
                                <label class="ckbox mg-b-0">
                                    <input type="checkbox" id="checkAll"><span></span>
                                </label>
                            </th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Stock</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Published At</th>
                            <th class="text-center">Action</th>
                            <th class="text-center">Featured</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>
                                <label class="ckbox mg-b-0">
                                    <input type="checkbox" class="checkboxes" name="product_checked[]" value={{$product->id}}><span></span>
                                </label>
                            </td>
                            <td>
                                <img width="50px" height="50px" src="{{ asset('uploads/products/thumbnail').'/'.$product->product_thumbnail }}" alt="">
                            </td>
                            <td>
                                {{ ucfirst($product->name) }} <br>
                                Id:{{$product->id}}
                            </td>
                            <td>
                                @if ($product->quantity > 0)
                                <strong class="text-success">{{ 'In Stock' }}</strong>
                                    ({{ $product->quantity }})
                                @else
                                    <strong class="text-danger">{{ 'Out of Stock' }}</strong>
                                @endif
                            </td>
                            <td>
                                @if ($product->special_price > 0)
                                <strong>${{ number_format($product->special_price, 2) }}</strong><br>
                                <small class="text-danger"><s>${{ number_format($product->regular_price, 2) }}<s></small>
                                @else
                                <strong>${{ number_format($product->regular_price, 2) }}</strong>
                                @endif
                            </td>
                            <td>{{ $product->category->category_name }}</td>
                            <td>
                                @if ($product->brand_id != null )
                                    {{ $product->brand->brand_name }}
                                @else
                                    <span class="text-danger">{{ "No Brand" }}</span>
                                @endif
                            </td>
                            <td>{{ Carbon\Carbon::parse($product->updated_at)->format('Y-m-d') }}</td>
                            <td class="text-center">
                                <a class="btn btn-success btn-sm" href="{{ route('view.product.show', $product->id) }}"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-info btn-sm my-1" href="{{ route('edit.product.show', $product->id) }}"><i class="fa fa-pencil"></i></a>
                                <a class="btn btn-danger btn-sm" onclick="return confirm('Sure?')" href="{{ route('delete.product', $product->id) }}"><i class="fa fa-trash"></i></a>
                            </td>
                            <th class="text-center">
                                <input type="checkbox" data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="warning" class=featured_product data-id={{ $product->id }} {{ $product->featured_product == 'yes' ? 'checked' : 'no' }}>
                            </th>
                        </tr>
                        @endforeach
                    </tbody>
                </form>
            </table>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function(){

        //FEATURED PRODUCT
        $(".featured_product").change(function(){
            var fid = $(this).attr('data-id');
            if(this.checked){
                var fstatus = 'yes';
            }else{
                var fstatus = 'no';
            }

            $.ajax({
                url: '/admin/featured-product/'+fid+'/'+fstatus,
                type: 'GET',
                success: function(result){
                    console.log(result);
                },
                error: function(error){
                    console.log(error);
                }
            });

        });

        //PRODUCT SELECTION BY CHECKBOX
        $('#checkAll').change(function()
        {
            if ($(this).is(":checked"))
            {
                $('.checkboxes').prop("checked", true);
            }
            else
            {
                $('.checkboxes').prop("checked", false);
            }
        });


    });
</script>
@endpush







