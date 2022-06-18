@extends('layouts.admin-master')
@section('page-title', 'Update Slider')

@section('content')

<div class="py-4 px-5 my-2">
    <div class="row">
        <div class="col-12 bg-light p-4">
            <h4 class="py-2">Update Slider</h4>

            <form action="{{ route('edit.slider.submit', $slider->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="mb-3 row">
                    <label for="" class="col-sm-3 col-form-label">Name: <span class="tx-danger"> (required)</span></label>
                    <div class="col-sm-8">
                        <input name="slider_name" class="form-control @error('slider_name') is-invalid @enderror" value="{{$slider->slider_name}}">
                        @error('slider_name')
                        <span class="text-danger fst-italic">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-4 row">
                    <label for="" class="col-sm-3 col-form-label">Title: <span class="tx-danger"> (required)</span></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $slider->title }}">
                        @error('title')
                        <span class="text-danger fst-italic">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-4 row">
                    <label for="" class="col-sm-3 col-form-label">Sub Title: <span class="tx-info"> (optional)</span></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control @error('sub_title') is-invalid @enderror" name="sub_title" value="{{ $slider->sub_title }}">
                        @error('sub_title')
                        <span class="text-danger fst-italic">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-4 row">
                    <label for="" class="col-sm-3 col-form-label">Description: <span class="tx-info"> (optional)</span></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $slider->description }}">
                        @error('description')
                        <span class="text-danger fst-italic">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-4 row">
                    <label for="" class="col-sm-3 col-form-label">Button: <span class="tx-info">(optional)</span></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control @error('slider_btn') is-invalid @enderror" name="slider_btn" value="{{ $slider->slider_btn }}">
                        @error('slider_btn')
                        <span class="text-danger fst-italic">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="" class="col-sm-3 col-form-label">Slider Image: <span class="tx-danger"> (required)</span></label>
                    <div class="col-sm-8">
                        <input type="file" class="mb-3 form-control @error('slider_image') is-invalid @enderror" name="slider_image">
                        <img width="500px" height="200px" src="{{ asset('uploads/sliders').'/'.$slider->slider_image }}" alt="">
                        <input type="hidden" name="old_slider" value="{{ $slider->slider_image}}">
                        @error('slider_image')
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
