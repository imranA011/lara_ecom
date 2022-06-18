@extends('layouts.admin-master')
@section('page-title', 'All Brands')

@section('content')

<div class="py-4 px-5 my-2">
    <div class="row">
        <div class="col-12 mx-auto bg-light p-4">
            <h4 class="py-2 mb-3">All Brands</h4>

            @if (session('update-message'))
                <h3 class="text-success text-center mb-4">{{ session('update-message') }}</h3>
            @endif
            @if (session('delete-message'))
                <h3 class="text-danger text-center mb-4">{{ session('delete-message') }}</h3>
            @endif
            @if (session('status-message'))
                <h3 class="text-success text-center mb-4">{{ session('status-message') }}</h3>
            @endif

            <table class="table table-hover text-center">
                <thead>
                    <tr>
                        <th class="text-center">
                            <label class="ckbox mg-b-0">
                              <input type="checkbox"><span></span>
                            </label>
                        </th>
                        <th class="text-center">ID</th>
                        <th class="text-center">Brand Name</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Published At</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($brands as $brand)
                    <tr>
                        <td>
                            <label class="ckbox mg-b-0">
                                <input type="checkbox"><span></span>
                            </label>
                        </td>
                        <td>{{ $brand->id}}</td>
                        <td>{{ Str::upper($brand->brand_name) }}</td>
                        <td>
                            @if ($brand->status == 'active')
                            <strong class="text-success">{{ ucfirst($brand->status) }}</strong>
                            @else
                            <strong class="text-danger">{{ ucfirst($brand->status) }}</strong>
                            @endif
                        </td>
                        <td>{{ Carbon\Carbon::parse($brand->updated_at)->format('Y-m-d') }}</td>
                        <td class="text-center">
                            <a class="btn btn-success py-1 px-2 rounded" href="">View</i></a>
                            <a class="btn btn-info py-1 px-2 rounded" href="{{ route('update.brand.show', $brand->id) }}">Edit</a>

                            @if ($brand->status == 'active')
                                <a class="btn btn-warning py-1 px-2 rounded" href="{{ route('update.brand.status', [$brand->id, 'inactive']) }}">Inactive</i></a>
                            @else
                                <a class="btn btn-primary py-1 px-2 rounded" href="{{ route('update.brand.status', [$brand->id, 'active']) }}">Active</i></a>
                            @endif

                            <a class="btn btn-danger py-1 px-2 rounded" onclick="return confirm('Sure?')" href="{{ route('delete.brand', $brand->id) }}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
