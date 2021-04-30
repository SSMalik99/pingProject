@extends('layouts.app')
@section('content')
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
            <form action="{{ route('addThisNewTask') }}" id="directAddTaskForm" class="row mt-3 " method="POST">
                @csrf
                <div class="col-md-2" style="margin-left: 3%;">
                    <h4>SELECT Task's Category</h4>
                    <small>You can select multiple categories</small>
                    <div class="form-check">
                        @foreach ($allCategories as $category)
                        <div class="form-check">
                            <input class="form-check-input" name="checkedCategory[]" type="checkbox" value="{{ $category->task_category_id }}" id="checkBox{{ $category->task_category_id }}">
                            <label class="form-check-label" for="checkBox{{ $category->task_category_id }}">
                                {{ $category->task_category_name }}
                            </label>
                          </div>
                        @endforeach
                    </div>
                    <br>
                    <small class="text text-Info fw-bold">Note:- Not Finding exact category add new category first</small><br>
                    <a class="btn btn-sm btn-primary" href="/addNewTaskCategory">ADD NEW CATEGORY</a>

                </div>
                <div class="col-md-8 ">
                    <label>Select User </label>
                    <select class="form-control text-center" name="userId">
                        <option>---select User---</option>
                        @foreach ($allUsers as $user)
                        <option value="{{ $user->user_id }}">{{ $user->user_id }}. {{ ucwords($user->name) }}
                        </option>    
                        @endforeach
                        
                    </select>
                    <div class="form-group">
                        <label for="taskTitle">Task Title</label>
                        <input type="text" class="form-control" name="taskTitle" id="taskTitle" value="{{ old('taskTitle') }}" placeholder="Enter title for the task">
                    </div>
                    <div class="form-group">
                        <label for="task_detail" class="form-label">Task Detail</label>
                        <textarea class="form-control" name="task_detail" id="task_detail" cols="30" rows="10" placeholder="enter some detail of the task">
                            {{ old('task_detail') }}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="taskStatus" class="form-label">Complete Status</label>
                        <select name="taskStatus" id="taskStatus" class="form-control">
                            <option value="0" selected>Not Completed</option>
                            <option value="1">Completed</option>
                        </select>
                    </div>
                    <button class="btn btn-primary" onsubmit="checkDirectTaskInput()">Add This Task</button>
                </div>
            </form>
        </div>
    </div>
    @push('script')
        <script src="{{ asset('js/customApp.js') }}"></script>
    @endpush

    
@endsection