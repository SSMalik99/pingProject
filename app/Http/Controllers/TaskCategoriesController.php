<?php

namespace App\Http\Controllers;

use App\Models\taskCategories;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\task;

class TaskCategoriesController extends Controller
{
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
        $taskCategories=taskCategories::all();
        return view('addNewTaskCategory')->with('taskCategories',$taskCategories);
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
        // dd($request->inputCategory);
        $request->validate([
            'inputCategory'=>'required|min:5'
        ]);
        $newCategory=new taskCategories();
        $newCategory->task_category_name = $request->inputCategory;
        $newCategory->save();
        return redirect('addNewTaskCategory');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\taskCategories  $taskCategories
     * @return \Illuminate\Http\Response
     */
    public function show(taskCategories $taskCategories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\taskCategories  $taskCategories
     * @return \Illuminate\Http\Response
     */
    public function edit(taskCategories $taskCategories,$id)
    {
        // dd($taskCategories);
        // dd($id);
        $category=$taskCategories::find($id);
        return view('editCategory')->with('category',$category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\taskCategories  $taskCategories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, taskCategories $taskCategories)
    {
        $request->validate([
            'inputCategoryName'=>'required|min:5'
        ]);
        $category=$taskCategories::find($request->inputCategory);
        $category->task_category_name=$request->inputCategoryName;
        $isUpdated=$category->save();
        if($isUpdated){
            return redirect('/addNewTaskCategory');
        }else{
            return view('editCategory')->with('category',$category);
        }
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\taskCategories  $taskCategories
     * @return \Illuminate\Http\Response
     */
    public function destroy(taskCategories $taskCategories,$id)
    {
        if($taskCategories::find($id)->delete()){
            return redirect('/addNewTaskCategory');
        }else{
            return redirect('/');
        }
        
    }
}
