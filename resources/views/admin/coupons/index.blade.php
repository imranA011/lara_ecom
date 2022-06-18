@extends('layouts.admin-master')
@section('page-title', 'Coupon')

@section('content')
    <div class="sl-pagebody">
        <div class="row row-sm">
            <div class="col-lg-8">
                <div class="card form-layout form-layout-4">
                    <h6 class="h4 mb-4">Coupon Lists</h6>
                    @if (session('update-message'))
                    <h5 class="text-success text-center mb-3">{{ session('update-message') }}</h5>
                    @endif
                    @if (session('delete-message'))
                        <h5 class="text-danger text-center mb-3">{{ session('delete-message') }}</h5>
                    @endif
                    @if (session('status-message'))
                        <h5 class="text-primary text-center mb-3">{{ session('status-message') }}</h5>
                    @endif
                    <table class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Coupon Code</th>
                                <th class="text-center">Discount(%)</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Created At</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($coupons as $coupon)
                            <tr>
                                <td class="text-center">{{$coupon->id}}</td>
                                <td class="text-center">{{$coupon->coupon_name}}</td>
                                <td class="text-center">{{$coupon->coupon_discount}}%</td>
                                <td class="text-center">{{ucfirst($coupon->status)}}</td>
                                <td>{{ Carbon\Carbon::parse($coupon->updated_at)->format('Y-m-d') }}</td>
                                <td class="text-center">
                                    <a class="btn btn-info py-1 rounded d-block" href="{{route('edit.coupon.show', $coupon->id)}}">Edit</a>

                                    @if ($coupon->status == 'active')
                                        <a class="btn btn-warning py-1 my-1 rounded d-block" href="{{ route('update.coupon.status', [$coupon->id, 'inactive']) }}">Inactive</a>
                                    @else
                                        <a class="btn btn-success py-1 my-1 rounded d-block" href="{{ route('update.coupon.status', [$coupon->id, 'active']) }}">Active</a>
                                    @endif

                                    <a class="btn btn-danger py-1 rounded d-block" onclick="return confirm('Sure?')" href="{{route('delete.coupon', $coupon->id)}}">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-4 mg-t-25 mg-xl-t-0">
                <div class="card form-layout form-layout-4">
                    <h6 class="h4 mb-4">Add Coupon </h6>
                    @if (session('create-message'))
                    <h5 class="text-success text-center mb-3">{{ session('create-message') }}</h5>
                    @endif
                    <form action="{{ route('coupon.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="form-control-label">Name: <span class="tx-danger">(required)</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" placeholder="Enter Coupon Name">
                            @error('name')
                            <span class="text-danger fst-italic">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Discount: <span class="tx-danger">(required)</span></label>
                            <input class="form-control @error('discount') is-invalid @enderror" type="text" name="discount" placeholder="Coupon Discount (%)">
                            @error('discount')
                            <span class="text-danger fst-italic">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-layout-footer mg-t-25">
                            <button type="submit" class="btn btn-info mg-r-5">Add New</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
