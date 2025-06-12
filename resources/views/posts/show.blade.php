@extends('layouts.app')

@section('title', $post->title)

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>{{ $post->title }}</h4>
                <div>
                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning btn-sm">Edit</a>
                    <a href="{{ route('posts.index') }}" class="btn btn-secondary btn-sm">Back</a>
                </div>
            </div>
            <div class="card-body">
                @if($post->author)
                    <p><strong>Author:</strong> {{ $post->author }}</p>
                @endif
                <p><strong>Created:</strong> {{ $post->created_at->format('M d, Y at h:i A') }}</p>
                @if($post->updated_at != $post->created_at)
                    <p><strong>Updated:</strong> {{ $post->updated_at->format('M d, Y at h:i A') }}</p>
                @endif
                <hr>
                <div class="content">
                    {!! nl2br(e($post->content)) !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection