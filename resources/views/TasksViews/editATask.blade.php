@extends('layouts.app')
@section('content')
    <div class="container">
        {{-- {{ dd($task) }} --}}
        <div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
                
            @endif
        </div>
        <div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div>
                <form action="{{ route('task.editATask') }}" id="directEditTaskForm" class="mt-3 " method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="task_id" id="task_id" value="{{ $task->task_id }}">
                    <input type="hidden" name="taskStatus" id="taskStatus" value="{{ $task->status }}">
                    <div>
                        <label>
                            Assign To
                        </label>
                        <select class="form-control text-center" name="userId">
                            <option>---select User---</option>
                            @foreach ($allUsers as $user)
                            @if ($user->user_id==$task->user_id)
                            <option value="{{ $user->user_id }}" selected>{{ $user->user_id }}. {{ ucwords($user->name) }}
                            </option>        
                            @else
                            <option value="{{ $user->user_id }}">{{ $user->user_id }}. {{ ucwords($user->name) }}
                            </option>    
                            @endif
                            
                            @endforeach
                        </select>
                        <small>
                            If you want to Assign task to someone else you are free to select.
                        </small>
                        <div class="form-group">
                            <label for="task_title">Task Title</label>
                            <input type="text" class="form-control" name="task_title" id="task_title" value="{{ $task->task_title }}" placeholder="Enter title for the task">
                        </div>
                        <div class="form-group">
                            <label for="task_detail" class="form-label">Task Detail</label>
                            <textarea class="form-control" name="task_detail" id="task_detail" cols="30" rows="10" placeholder="enter some detail of the task">
                                {{ $task->task_detail }}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="taskStatus" class="form-label">
                                Task Category
                            </label>
                            <select name="task_category_id" id="task_category_id" class="form-control">
                                @foreach ($allCategories as $category)
                                    @if ($task->task_category_id==$category->task_category_id)
                                        <option value="{{ $category->task_category_id }}" selected>{{ $category->task_category_name }}</option>
                                    @else
                                    <option value="{{ $category->task_category_id }}" >{{ $category->task_category_name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <button class="btn btn-primary" onsubmit="checkDirectTaskInput()">Edit This Task</button>
                    </div>
                </form>
            </div>
        </div>
        @push('script')
            <script src="{{ asset('js/customApp.js') }}"></script>
        @endpush
    </div>
@endsection