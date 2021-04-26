<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\trialPosts;

class trialPost extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=trialPosts::all();
        return view('posts')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addNewPost');
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
        // dd($request->inputTitle);
        // dd($request->inputDetail);
        $request->validate([
            'inputTitle'=>'required|min:3',
            'inputDetail'=>'required|min:3'
        ],[
            'inputTitle.required'=>'title is required',
            'inputDetail.required'=>'Detail is required'
        ]);
        $newPost=new trialPosts();
        $newPost->title=$request->inputTitle;
        $newPost->detail=$request->inputDetail;
        $isInserted=$newPost->save();
        if($isInserted){
            return redirect('posts');
        }else{
            return redirect('posts/addNewPost');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=trialPosts::findOrFail($id);
        return view('post')->with('post',$post);
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=trialPosts::findOrFail($id);
        return view('editPost')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    //    dd($request); 
       $request->validate([
           'inputTitle'=>'required|min:3',
            'inputDetail'=>'required|min:3'
        ],[
            'inputTitle.required'=>'title is required',
            'inputDetail.required'=>'Detail is required'
        ]);
        $post=trialPosts::find($id);
        $post->title=$request->inputTitle;
        $post->detail=$request->inputDetail;
        $isUpdated=$post->save();
        if($isUpdated){
            return redirect('posts');
        }else{
            return redirect('posts/editPost/'.$id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=trialPosts::find($id);
        $isDeleted=$post->delete();
        if($isDeleted){
            return redirect('posts');
        }else{
            return redirect('posts/deletePost/'.$id);
        }
    }
}
