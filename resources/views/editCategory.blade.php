@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="/editThisCategory" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <input type="hidden" class="form-control" id="inputTitle" name="inputCategory" aria-describedby="category_id" value="{{ $category->task_category_id }}">
            </div>
            <div class="mb-3">
                <label for="inputCategoryName" class="form-label">Edit Category Name</label>
                <input type="text" class="form-control" id="inputCategoryName" name="inputCategoryName" aria-describedby="inputCategoryName" required  value="{{ $category->task_category_name }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection