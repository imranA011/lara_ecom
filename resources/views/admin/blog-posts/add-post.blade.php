@extends('layouts.admin-master')
@section('page-title', 'Add Post')

@section('content')
<div class="py-4 px-5 my-2">
    <div class="row">
        <div class="col-12 bg-light p-4">
            <h4 class="py-2 mb-3">Add New Post</h4>
            <form action="{{ route('add.post.submit') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                @if (session('create-message'))
                    <h3 class="text-info text-center py-2">{{ session('create-message') }}</h3>
                @endif

                <div class="row ">
                    <div class="col-lg-8 mb-2">
                        <div class="form-group">
                            <label class="form-control-label">Post Title: <small class="tx-danger">(required)</small></label>
                            <input type="text" class="form-control @error('post_title') is-invalid @enderror" name="post_title">
                            @error('post_title')
                                <span class="text-danger fst-italic">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Post Description: <small class="tx-danger">(required) </small> </label>
                            <textarea class="@error('post_description') is-invalid @enderror" name="post_description" id="summernote"> </textarea>
                            @error('post_description')
                                <span class="text-danger fst-italic">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4 mb-2">
                        <div class="form-group">
                            <label class="form-control-label">Author Name: <small class="tx-danger"> (required)</small></label>
                            <input class="form-control @error('post_author') is-invalid @enderror" type="text" name="post_author">
                            @error('post_author')
                                <span class="text-danger fst-italic">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Post Date: <small class="tx-danger"> (required)</small></label>
                            <input class="form-control @error('post_date') is-invalid @enderror" type="date" name="post_date">
                            @error('post_date')
                                <span class="text-danger fst-italic">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Post Category: <small class="tx-info"> (optional)</small></label>
                            <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                <option value="">Select Category</option>
                                @php($categories = App\Models\Category::all())
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}" >{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Post Thumbnail: <small class="tx-danger">(required)</small></label>
                            <input type="file" class="form-control @error('post_thumbnail') is-invalid @enderror" name="post_thumbnail">
                            @error('post_thumbnail')
                                <span class="text-danger fst-italic">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-layout-footer">
                    <button type="submit" name="submit" class="btn btn-info mg-r-5">Add Post</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
