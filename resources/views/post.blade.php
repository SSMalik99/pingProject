@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="text-success fw-bold mt-3">
            Post id: {{ $post->id }}
        </div>
        <div class="mt-3">
            <span class="text-danger">post title:</span>
            <h3>{{ $post->title }}</h3>
        </div>
        <div class="text-light">
            <strong>Post Detail</strong>
            <p>
                {{ $post->detail }}
            </p>
        </div>
        <a href="/posts/editPost/{{ $post->id }}" class="btn btn-sm btn-success">Edit</a>
        <a href="/posts/deletePost/{{ $post->id }}" class="btn btn-sm btn-danger">Delete</a>
                
        <a class="btn btn-sm btn-primary" href="/posts">Go Back</a>
    </div>  
    
@endsection