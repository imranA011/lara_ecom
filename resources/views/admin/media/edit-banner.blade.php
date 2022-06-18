@extends('layouts.admin-master')
@section('page-title', 'Update Banner')

@section('content')

<div class="py-4 px-5 my-2">
    <div class="row">
        <div class="col-12 bg-light p-4">
            <h4 class="py-2">Update Banner</h4>

            <form action="{{ route('edit.banner.submit', $banner->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="mb-3 row">
                    <label for="" class="col-sm-3 col-form-label">Name: <span class="tx-danger"> (required)</span></label>
                    <div class="col-sm-8">
                        <input name="banner_name" class="form-control @error('banner_name') is-invalid @enderror" value="{{$banner->banner_name}}">
                        @error('banner_name')
                        <span class="text-danger fst-italic">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-4 row">
                    <label for="" class="col-sm-3 col-form-label">Banner Type: <span class="tx-danger">(required)</span></label>
                    <div class="col-sm-8">
                        <select name="banner_type" class="form-control @error('banner_type') is-invalid @enderror"  value="{{$banner->banner_type}}">
                            <option value="">Select Banner Type</option>
                            <option value="Full">Full Length</option>
                            <option value="half">Half Length</option>
                            <option value="Quarter">Quarter Length</option>
                        </select>
                        @error('banner_type')
                        <span class="text-danger fst-italic">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-4 row">
                    <label for="" class="col-sm-3 col-form-label">Title: <span class="tx-danger"> (required)</span></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $banner->title }}">
                        @error('title')
                        <span class="text-danger fst-italic">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-4 row">
                    <label for="" class="col-sm-3 col-form-label">Sub Title: <span class="tx-info"> (optional)</span></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control @error('sub_title') is-invalid @enderror" name="sub_title" value="{{ $banner->sub_title }}">
                        @error('sub_title')
                        <span class="text-danger fst-italic">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="" class="col-sm-3 col-form-label">banner Image: <span class="tx-danger"> (required)</span></label>
                    <div class="col-sm-8">
                        <input type="file" class="mb-3 form-control @error('banner_image') is-invalid @enderror" name="banner_image">
                        <img width="500px" height="200px" src="{{ asset('uploads/banners').'/'.$banner->banner_image }}" alt="">
                        <input type="hidden" name="old_banner" value="{{ $banner->banner_image}}">
                        @error('banner_image')
                        <span class="text-danger fst-italic">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="" class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-8">
                        <input type="submit" class="btn btn-info px-4 mt-sm-2" name="submit" value="Update">
                        <button class="btn btn-danger px-4 mt-sm-2 mx-2">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
