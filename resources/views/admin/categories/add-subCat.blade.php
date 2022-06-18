@extends('layouts.admin-master')
@section('page-title', 'Add Sub-Category')

@section('content')

<div class="py-4 px-5 my-2">
    <div class="row">
        <div class="col-12 bg-light p-4">
            <h4 class="py-2 mb-3">Add New Sub-Category</h4>

            <form action="{{ route('add.sub.category.submit')}}" method="POST">
                {{ csrf_field() }}

                @if (session('create-message'))
                    <h3 class="text-info text-center py-2">{{ session('create-message') }}</h3>
                @endif

                <div class="mb-3 row">
                    <label for="" class="col-sm-3 col-form-label">Category Name: <span class="tx-danger"> (required)</span></label>
                    <div class="col-sm-8">
                        <select name="category_id" class="form-control select2 @error('category_id') is-invalid @enderror" data-placeholder="Choose Category">
                            <option label="Choose Category"></option>
                            @php($categories = App\Models\Category::all())
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="text-danger fst-italic">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="" class="col-sm-3 col-form-label">Sub-Category Name: <span class="tx-danger"> (required)</span></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control @error('subCat_name') is-invalid @enderror" name="subCat_name">
                        @error('subCat_name')
                        <span class="text-danger fst-italic">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="" class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-8">
                        <input type="submit" class="btn btn-info px-4 mt-sm-2" name="submit" value="Add Sub Category">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
