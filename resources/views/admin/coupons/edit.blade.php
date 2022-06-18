@extends('layouts.admin-master')
@section('page-title', 'Coupon')

@section('content')
    <div class="sl-pagebody">
        <div class="row row-sm">
            <div class="col-md-8 mg-t-25 mg-xl-t-0 mx-auto">
                <div class="card form-layout form-layout-4">
                    <h6 class="h4 mb-4">Update Coupon </h6>

                    <form action="{{ route('edit.coupon.submit', $coupon->id)}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="form-control-label">Coupon Name: <span class="tx-danger">(required)</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{$coupon->coupon_name}}">
                            @error('name')
                            <span class="text-danger fst-italic">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Coupon Discount(%): <span class="tx-danger">(required)</span></label>
                            <input class="form-control @error('discount') is-invalid @enderror" type="text" name="discount" value="{{$coupon->coupon_discount}}">
                            @error('discount')
                            <span class="text-danger fst-italic">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-layout-footer mg-t-25">
                            <button type="submit" class="btn btn-info mg-r-5">Update</button>
                            <button type="btn" class="btn btn-secondary mg-r-5">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
