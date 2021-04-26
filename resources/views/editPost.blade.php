@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="/editThisPost/{{ $post->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <input type="hidden" class="form-control" id="inputTitle" name="inputTitle" aria-describedby="postId" value="{{ $post->id }}">
            </div>
            <div class="mb-3">
                <label for="inputTitle" class="form-label">Enter Title</label>
                <input type="text" class="form-control" id="inputTitle" name="inputTitle" aria-describedby="postTitle" required oninput="checkData(this.id,'titleCheck')" value="{{ $post->title }}">
            </div>
            
            <div class="mb-3">
                <label for="inputDetail" class="form-label">Enter Detail</label>
                <textarea class="form-control" id="inputDetail" name="inputDetail" aria-describedby="postDetail" required oninput="checkData(this.id,'checkDetail')" placeholder="enter Detail of your task" >{{ $post->detail }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>    
@endsection