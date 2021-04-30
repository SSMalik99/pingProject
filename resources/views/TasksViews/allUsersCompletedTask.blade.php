@extends('layouts.app')
@section('content')
    <div class="row">
        {{-- {{ dd($usersAllTasks) }} --}}
        <div class="col-md-2"></div>
        <div class="col-md-10">
            <table class="table">
                <thead>
                    <th>Task Id</th>
                    <th>Task Title</th>
                    <th>Task Detail</th>
                    <th>Assigned To</th>
                    <th>Task Category</th>
                    <th>Task Status</th>
                    <th>Assigned at</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($usersAllTasks as $task)
                        <tr>
                            <td><a href="#">{{ $task->task_id }}</a></td>
                            <td><a href="#">{{ $task->task_title }}</a></td>
                            <td>{{ $task->task_detail }}</td>
                            <td><a href="#">{{ $task->user->name }}</a></td>
                            <td>{{ $task->category->task_category_name }}</td>
                            <td>Complete</td>
                            <td>{{ $task->created_at }}</td>
                            <td>
                                <a href="{{ route('makeThisTaskPending',$task->task_id) }}" class="btn btn-success btn-sm">Reassign Again</a>
                                <a href="{{ route('task.editThisTask',$task->task_id) }}" class="btn btn-sm btn-secondary" >Edit</a>
                                <a href="{{ route('deleteThisTask',$task->task_id) }}" class="btn btn-sm btn-danger" onclick="return confirmDelete()">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @push('script')
        <script src="{{ asset('js/customApp.js') }}"></script>
    @endpush
@endsection