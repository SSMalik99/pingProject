<?php

namespace App\Http\Controllers;

use App\Models\userTasks;
use Illuminate\Http\Request;

class UserTasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'i am index and working fine';
    }
    public function usersPendingTasks(userTasks $userTasks){
        $usersAllTasks=$userTasks::where('status',0)->get();
        dd($usersAllTasks);
    }
    public function usersCompletedTasks(userTasks $userTasks){
        $usersAllTasks=$userTasks::where('status',1)->get();
        dd($usersAllTasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        dd($userAllTask);
        
    }
    public function showCompletedTasks(userTasks $userTasks,$user_id)
    {
        $userAllTask = $userTasks::where(['user_id'=>$user_id,'status'=>1])->get();
        dd($userAllTask);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\userTasks  $userTasks
     * @return \Illuminate\Http\Response
     */
    public function edit(userTasks $userTasks)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\userTasks  $userTasks
     * @return \Illuminate\Http\Response
     */
    public function destroy(userTasks $userTasks)
    {
        //
    }
}
