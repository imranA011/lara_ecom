@extends('layouts.admin-master')
@section('page-title', 'Product Attributes')

@section('content')
    <div class="sl-pagebody">
        <div class="row row-sm mb-4">
            <div class="col-lg-12  mg-xl-t-0">
                <div class="card form-layout form-layout-4">
                    <h6 class="h4 mb-4">Add New {{ ucfirst($attributeItem->attribute_name) }}</h6>
                    @if (session('create-message'))
                        <h5 class="text-success text-center mb-3">{{ session('create-message') }}</h5>
                    @endif
                    <form action="{{ route('store.attribute.item', $attributeItem->id) }}" method="POST">
                        @csrf
                        <div class="row mg-b-10">
                            <label for="" class="col-sm-2 py-2 col-form-label">Add {{  ucfirst($attributeItem->attribute_name) }} Name: <span
                                    class="tx-danger">*</span></label>
                            <div class="col-sm-8 py-2">
                                <input type="text" class="form-control @error('item_name') is-invalid @enderror"
                                    name="item_name" placeholder="Enter {{ $attributeItem->attribute_name }} name">
                                @error('item_name')
                                    <span class="text-danger fst-italic">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-2 py-2">
                                <button type="submit" class="btn btn-info ">Add New</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card form-layout form-layout-4">
                    <h6 class="h4 mb-4">{{  ucfirst($attributeItem->attribute_name) }} Lists</h6>
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
                                <th class="text-center">ID</th>
                                <th class="text-center">{{ $attributeItem->attribute_name }} Name</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($itemLists as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td> {{ $item->item_name }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-danger my-1 py-1 rounded" onclick="return confirm('Sure?')"
                                            href="{{ route('delete.attribute.item', $item->id) }}">Delete</a>
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

