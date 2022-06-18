@extends('layouts.admin-master')
@section('page-title', 'Add Slider')

@section('content')

<div class="py-4 px-5 my-2">
    <div class="row">
        <div class="col-12 bg-light p-4">
            <h4 class="py-2 mb-3">Add New Slider</h4>

            <form action="{{ route('add.slider.submit')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                @if (session('create-message'))
                    <h3 class="text-info text-center py-2">{{ session('create-message') }}</h3>
                @endif

                <div class="mb-4 row">
                    <label for="" class="col-sm-3 col-form-label">Slider Name: <span class="tx-danger">(required)</span></label>
                    <div class="col-sm-8">
                        <input type="text" name="slider_name" class="form-control @error('slider_name') is-invalid @enderror">
                        @error('slider_name')
                        <span class="text-danger fst-italic">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-4 row">
                    <label for="" class="col-sm-3 col-form-label">Title: <span class="tx-danger"> (required)</span></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title">
                        @error('title')
                        <span class="text-danger fst-italic">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-4 row">
                    <label for="" class="col-sm-3 col-form-label">Sub Title: <span class="tx-info"> (optional)</span></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control @error('sub_title') is-invalid @enderror" name="sub_title">
                        @error('sub_title')
                        <span class="text-danger fst-italic">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-4 row">
                    <label for="" class="col-sm-3 col-form-label">Description: <span class="tx-info"> (optional)</span></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control @error('description') is-invalid @enderror" name="description">
                        @error('description')
                        <span class="text-danger fst-italic">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-4 row">
                    <label for="" class="col-sm-3 col-form-label">Button: <span class="tx-info"> (optional)</span></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control @error('slider_btn') is-invalid @enderror" name="slider_btn">
                        @error('slider_btn')
                        <span class="text-danger fst-italic">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-4 row">
                    <label for="" class="col-sm-3 col-form-label">Slider Image: <span class="tx-danger"> (required)</span></label>
                    <div class="col-sm-8">
                        <input type="file" class="form-control @error('slider_image') is-invalid @enderror" name="slider_image">
                        @error('slider_image')
                        <span class="text-danger fst-italic">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="" class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-8">
                        <input type="submit" class="btn btn-info px-4 mt-sm-2" name="submit" value="Add Slider">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
