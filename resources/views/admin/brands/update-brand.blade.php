@extends('layouts.admin-master')
@section('page-title', 'Update Brand')

@section('content')

<div class="py-4 px-5 my-2">
    <div class="row">
        <div class="col-12 bg-light p-4">
            <h4 class="py-2">Update Brand</h4>

            <form action="{{ route('update.brand.submit', $brand->id) }}" method="POST">
                {{ csrf_field() }}

                <div class="mb-3 row">
                    <label for="" class="col-sm-2 col-form-label">Name: <span class="tx-danger">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control @error('brand_name') is-invalid @enderror" name="brand_name" value="{{ $brand->brand_name }}">
                        @error('brand_name')
                        <span class="text-danger fst-italic">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <input type="submit" class="btn btn-info px-4 mt-sm-2" name="submit" value="Update">
                        <button class="btn btn-danger px-4 mt-sm-2 mx-2">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
