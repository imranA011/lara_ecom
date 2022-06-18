@extends('layouts.admin-master')
@section('page-title', 'Offers')

@section('content')
    <div class="sl-pagebody">
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card form-layout form-layout-4">
                    <h6 class="h4 mb-4">Offer Product Lists</h6>
                    @if (session('update-message'))
                    <h6 class="text-success text-center mb-3">{{ session('update-message') }}</h6>
                    @endif
                    @if (session('delete-message'))
                        <h5 class="text-danger text-center mb-3">{{ session('delete-message') }}</h5>
                    @endif
                    @if (session('status-message'))
                        <h5 class="text-primary text-center mb-3">{{ session('status-message') }}</h5>
                    @endif
                    <table class="table table-hover text-center table-responsive">
                        <thead>
                            <tr>
                                <th class="text-center">Product ID</th>
                                <th class="text-center">Product Lists</th>
                                <th class="text-center">Offer Name</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($offer_products as $product)
                                <tr>
                                    <td class="text-center">{{ $product->id }}</td>
                                    <td class="text-center">{{ $product->name }}</td>
                                    <td class="text-center">{{ $product->pivot->pivotParent->offer_name }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-danger my-1 py-1 rounded" onclick="return confirm('Sure?')" href="{{route('delete.offer.product', $product->id)}}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
