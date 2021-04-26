@extends('layouts.app')
@section('content')
    <div class="container">
            <table class="table">
                <thead class="text-warning">
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
                            <td class="text-light">{{ $post->detail }}</td>
                            <td>
                                <a href="posts/editPost/{{ $post->id }}" class="btn btn-sm btn-success">Edit</a>
                                <a href="posts/deletePost/{{ $post->id }}" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        <div>
            <a href="posts/addNewPost" class="btn btn-sm btn-primary">Add new Post</a>
        </div>
    </div>
@endsection