@extends('layouts.app')
@section('content')
    @auth
    <div class="container">
            <table class="table">
                <thead class="text-danger">
                    <th>Post id</th>
                    <th>post Title</th>
                    <th>Post Detail</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td><a href="posts/post/{{ $post->id }}">{{ $post->id }}</a></td>
                            <td><a href="posts/post/{{ $post->id }}">{{ $post->title }}</a></td>
                            <td class="text-primary">{{ $post->detail }}</td>
                            <td>
                                @if (Auth::user()->user_id===$post->user_id)
                                <a href="posts/editPost/{{ $post->id }}" class="btn btn-sm btn-success">Edit</a>
                                <a href="posts/deletePost/{{ $post->id }}" class="btn btn-sm btn-danger" onclick="return confirmDelete()">Delete</a>
                                @else
                                <div class="alert alert-success">
                                    This is the post by {{ ucwords($post->user->name) }}
                                </div>    
                                @endif
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        <div>
            <a href="posts/addNewPost" class="btn btn-sm btn-primary">Add new Post</a>
        </div>
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