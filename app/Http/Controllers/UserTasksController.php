<?php

namespace App\Http\Controllers;

use App\Models\taskCategories;
use App\Models\User;
use App\Models\userTasks;
use Illuminate\Http\Request;

class UserTasksController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tasks=new userTasks();
        $allUsers=User::all();
        $allCategories=taskCategories::all();
        return view('TasksViews.assignNewTask',[
            'tasks'=>$tasks,
            'allUsers'=>$allUsers,
            'allCategories'=>$allCategories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'checkedCategory'=>'required',
            'userId' => 'required|numeric',
            'taskTitle' => 'required|string|min:5|max:60',
            'task_detail'=> 'required|string|min:5',
            'taskStatus' => 'required'
        ]);
        // dd($request->checkedCategory);
        $isAdded='';
        foreach ($request->checkedCategory as $category) {
            $isAdded=userTasks::create([
                'task_title'=>$request->taskTitle,
                'task_detail'=>$request->task_detail,
                'user_id'=>$request->userId,
                'task_category_id'=>$category,
                'status'=>$request->taskStatus,
            ]);
        }
        // dd($isAdded);
        if($isAdded && $request->taskStatus==1){
            return redirect('/AllUsersCompletedTasks');
        }elseif($isAdded && $request->taskStatus==0){
            return redirect('/AllUsersPendingTasks');
        }else{
            return redirect('/directAssignNewTask');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\userTasks  $userTasks
     * @return \Illuminate\Http\Response
     */
    public function showPendingTasks(userTasks $userTasks,$user_id)
    {
        $userAllTask = $userTasks::where(['user_id'=>$user_id,'status'=>0])->get();
        return view('TasksViews.focusUserPendingTask',[
            'userAllTask'=>$userAllTask,
            'message'=>'cool pending task'
        ]);
        
    }
    public function showCompletedTasks(userTasks $userTasks,$user_id)
    {
        $userAllTask = $userTasks::where(['user_id'=>$user_id,'status'=>1])->get();
        return view('TasksViews.focusUserCompletedTask',[
            'userAllTask'=>$userAllTask,
            'message'=>'cool completed task'
        ]);
        
    }

    public function usersPendingTasks(userTasks $userTasks){
        $usersAllTasks=$userTasks::where('status',0)->get();
        return view('TasksViews.allUsersPendingTasks',[
            'usersAllTasks'=>$usersAllTasks,
        ]);
    }
    public function usersCompletedTasks(userTasks $userTasks){
        $usersAllTasks=$userTasks::where('status',1)->get();
        return view('TasksViews.allUsersCompletedTask',[
            'usersAllTasks'=>$usersAllTasks,
        ]);
    }

    public function makeComplete($task_id){
        $task=userTasks::find($task_id);
        $task->status=1;
        $task->save();
        return redirect('/AllUsersPendingTasks');
    }
    public function makePending($task_id){
        $task=userTasks::find($task_id);
        $task->status=0;
        $task->save();
        return redirect('/AllUsersPendingTasks');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\userTasks  $userTasks
     * @return \Illuminate\Http\Response
     */
    public function edit(userTasks $userTasks,$task_id)
    {
        $task=$userTasks::find($task_id);
        $allUsers=User::all();
        $allCategories=taskCategories::all();
        return view('TasksViews.editATask',[
            'task'=>$task,
            'allUsers'=>$allUsers,
            'allCategories'=>$allCategories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\userTasks  $userTasks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, userTasks $userTasks)
    {
        // dd($request);
        $request->validate([
            'task_category_id'=>'required',
            'userId' => 'required|numeric',
            'task_title' => 'required|string|min:5|max:60',
            'task_detail'=> 'required|string|min:5',
        ]);
        $task=$userTasks::find($request->task_id);
        $task->task_title=$request->task_title;
        $task->task_detail=$request->task_detail;
        $task->user_id=$request->user_id;
        $task->task_category_id=$request->task_category_id;
        $isUpdated=$task->save();
        if($isUpdated && $request->taskStatus==1){
            return redirect('AllUsersCompletedTasks');
        }elseif($isUpdated && $request->taskStatus==0){
            return redirect('AllUsersPendingTasks');
        }else{
            return redirect('task.editThisTask/'.$request->task_id);
        }
        // return redirect('')
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\userTasks  $userTasks
     * @return \Illuminate\Http\Response
     */
    public function destroy(userTasks $userTasks,$task_id)
    {
        dd($task_id);
        $task=$userTasks::find($task_id);
        $task->delete();
        return redirect('/AllUsersPendingTasks');
    }
}
