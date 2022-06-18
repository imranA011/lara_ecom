@extends('layouts.admin-master')
@section('page-title', 'All Banners')

@section('content')

<div class="py-4 px-5 my-2">
    <div class="row">
        <div class="col-12 mx-auto bg-light p-4">
            <h4 class="py-2 mb-3">All Banners</h4>

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
                        <th class="text-center">Banner Name</th>
                        <th class="text-center">Banner Type</th>
                        <th class="text-center">Banner Image</th>
                        <th class="text-center">Title</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Published At</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($banners as $banner)
                    <tr>
                        <td>
                            <label class="ckbox mg-b-0">
                            <input type="checkbox"><span></span>
                            </label>
                        </td>
                        <td>{{ $banner->id }}</td>
                        <td>{{ $banner->banner_name }}</td>
                        <td>{{ $banner->banner_type }}</td>
                        <td>
                            <img width="100px" height="50px" src="{{ asset('uploads/banners').'/'.$banner->banner_image }}" alt="">
                        </td>
                        <td>{{ $banner->title }}</td>
                        <td>
                            @if ($banner->status == 'active')
                            <strong class="text-success">{{ ucfirst($banner->status) }}</strong>
                            @else
                            <strong class="text-danger">{{ ucfirst($banner->status) }}</strong>
                            @endif
                        </td>
                        <td>{{ Carbon\Carbon::parse($banner->updated_at)->format('Y-m-d') }}</td>
                        <td class="text-center">
                            <a class="btn btn-info py-1 my-1 rounded d-block" href="{{ route('edit.banner.show', $banner->id) }}">Edit</a>

                            @if ($banner->status == 'active')
                                <a class="btn btn-warning py-1 my-1 rounded d-block" href="{{ route('update.banner.status', [$banner->id, 'inactive']) }}">Inactive</a>
                            @else
                                <a class="btn btn-primary py-1 my-1 rounded d-block" href="{{ route('update.banner.status', [$banner->id, 'active']) }}">Active</a>
                            @endif

                            <a class="btn btn-danger py-1 my-1 rounded d-block" onclick="return confirm('Sure?')" href="{{ route('delete.banner', $banner->id) }}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
