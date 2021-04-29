@extends('layouts.app')
@section('content')
    @auth
        
    <div class="container">
        <div class="text-success fw-bold mt-3">
            Post id: {{ $post->id }}
        </div>
        <div class="mt-3">
            <span class="text-danger">post title:</span>
            <h3>{{ $post->title }}</h3>
        </div>
        <div class="text-primary">
            <strong>Post Detail</strong>
            <p>
                {{ $post->detail }}
            </p>
        </div>
        @if(Auth::user()->user_id===$post->user_id)
        <a href="/posts/editPost/{{ $post->id }}" class="btn btn-sm btn-success">Edit</a>
        <a href="/posts/deletePost/{{ $post->id }}" class="btn btn-sm btn-danger" onclick="return confirmDelete()">Delete</a>
        @endif
        <a class="btn btn-sm btn-primary" href="/posts">Go Back</a>
    </div>  
    @endauth
    @guest
    <div class="container">
        <div class="alert alert-warning">
            We hope you have good purpose to enter this website, but we can't trust everybody so please login or register youself with us.   
        </div>
    </div>
    @endguest
    @push('script')
        <script src="{{ asset('js/customApp.js') }}"></script>
    @endpush
@endsection