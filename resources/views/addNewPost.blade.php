@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="post/addNew" method="POST">
            @csrf
            <div class="mb-3">
            <label for="inputTitle" class="form-label">Enter Title</label>
            <input type="text" class="form-control" id="inputTitle" name="inputTitle" aria-describedby="postTitle" required oninput="checkData(this.id,'titleCheck')">
            </div>
            <div id="titleCheck" style="color:red"></div>
            <div class="mb-3">
            <label for="inputDetail" class="form-label">Enter Detail</label>
            <textarea class="form-control" id="inputDetail" name="inputDetail" aria-describedby="postDetail" required oninput="checkData(this.id,'checkDetail')" placeholder="enter Detail of your task"></textarea>
            </div>
            <div id="checkDetail" style="color:red"></div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        @push('script')
            <script src="{{ asset('js/customApp.js') }}"></script>
        @endpush
    </div>    
@endsection
