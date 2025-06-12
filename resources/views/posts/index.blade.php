@extends('layouts.app')

@section('title', 'All Posts')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>All Posts</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-primary">Create New Post</a>
</div>

@if($posts->count() > 0)
    <div class="row">
        @foreach($posts as $post)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ Str::limit($post->content, 100) }}</p>
                        @if($post->author)
                            <small class="text-muted">By: {{ $post->author }}</small>
                        @endif
                    </div>
                    <div class="card-footer">
                        <div class="btn-group w-100" role="group">
                            <a href="{{ route('posts.show', $post) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{ $posts->links() }}
@else
    <div class="alert alert-info">
        <h4>No posts found!</h4>
        <p>Get started by <a href="{{ route('posts.create') }}">creating your first post</a>.</p>
    </div>
@endif
@endsection