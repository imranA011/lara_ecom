@extends('layouts.admin-master')
@section('page-title', 'All Posts')

@section('content')

<div class="py-4 px-5 my-2">
    <div class="row">
        <div class="col-12 mx-auto bg-light p-4">
            <h4 class="py-2 mb-3">All Posts</h4>

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
                        <th class="text-center">Post Thumbnail</th>
                        <th class="text-center">Post Title</th>
                        <th class="text-center">Post Category</th>
                        <th class="text-center">Post Author</th>
                        <th class="text-center">Post Date</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>
                            <label class="ckbox mg-b-0">
                                <input type="checkbox"><span></span>
                            </label>
                        </td>
                        <td>{{ $post->id}}</td>
                        <td>
                            <img width="100px" height="70px" src="{{ asset('uploads/posts').'/'.$post->post_thumbnail }}" alt="">
                        </td>
                        <td>{{ $post->post_title }}</td>
                        <td>{{ ucfirst($post->category->category_name) }}</td>
                        <td>{{ ucfirst($post->post_author) }}</td>
                        <td>{{ \Carbon\Carbon::parse($post->post_date)->format('d/m/Y') }}</td>
                        <td>
                            @if ($post->status == 'active')
                            <strong class="text-success">{{ ucfirst($post->status) }}</strong>
                            @else
                            <strong class="text-danger">{{ ucfirst($post->status) }}</strong>
                            @endif
                        </td>
                        <td class="text-center">
                            <a class="btn btn-info py-1 my-1 rounded d-block" href="{{ route('edit.post.show', $post->id) }}">Edit</a>

                            @if ($post->status == 'active')
                                <a class="btn btn-warning py-1 my-1 rounded d-block" href="{{ route('update.post.status', [$post->id, 'inactive']) }}">Inactive</i></a>
                            @else
                                <a class="btn btn-primary py-1 my-1 rounded d-block" href="{{ route('update.post.status', [$post->id, 'active']) }}">Active</i></a>
                            @endif

                            <a class="btn btn-danger py-1 my-1 rounded d-block" onclick="return confirm('Sure?')" href="{{ route('delete.post', $post->id) }}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
