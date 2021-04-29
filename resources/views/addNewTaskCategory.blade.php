@extends('layouts.app')
@section('content')
    <div class="container">
        @auth
        @if (!empty($taskCategories))
        <div style="text-align: center;font-weight:bold;" class="text-primary">Available Categories</div>
            <table class="table">
                <thead class="text-danger">
                    <th>categories id</th>
                    <th>category name</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($taskCategories as $taskCategory)
                        <tr>
                            <td>{{ $taskCategory->task_category_id }}</td>
                            <td>{{ $taskCategory->task_category_name }}</td>
                            <td>
                                <a href="/removeCategory/{{ $taskCategory->task_category_id }}" class="btn btn-sm btn-danger" onclick="return confirmDelete()">Remove</a>
                                <a href="/editCategory/{{ $taskCategory->task_category_id }}" class="btn btn-sm btn-success">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
        <div class="alert alert-warning">
            Oh nooo there is no category available.
        </div>
        @endif
        <hr>
        <form action="/addNewCategory" method="POST">
            @csrf
            <div class="mb-3">
                <label for="inputCategory" class="form-label">Enter New Category</label>
                <input type="text" class="form-control" id="inputCategory" name="inputCategory" aria-describedby="postTitle" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        @endauth
        @push('script')
        <script src="{{ asset('js/customApp.js') }}"></script>
            
        @endpush
    </div>    
@endsection
