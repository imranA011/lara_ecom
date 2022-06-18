@extends('layouts.admin-master')
@section('page-title', 'Update Category')

@section('content')

<div class="py-4 px-5 my-2">
    <div class="row">
        <div class="col-12 bg-light p-4">
            <h4 class="py-2">Update Category</h4>

            <form action="{{ route('edit.category.submit', $category->id) }}" method="POST">
                {{ csrf_field() }}

                <div class="mb-3 row">
                    <label for="" class="col-sm-2 col-form-label">Name: <span class="tx-danger">(required)</span></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control @error('category_name') is-invalid @enderror" name="category_name" value="{{ $category->category_name }}">
                        @error('category_name')
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
