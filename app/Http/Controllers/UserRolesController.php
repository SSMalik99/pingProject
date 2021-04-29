<?php

namespace App\Http\Controllers;

use App\Models\userRoles;
use Illuminate\Http\Request;

class UserRolesController extends Controller
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
        $userRoles=userRoles::all();
        return view('userRolesView.addNewRole')->with('userRoles',$userRoles);
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
            'inputRole'=>'required|min:4',
        ],[
            'inputRole.min'=>'atleast 4 character allowed',
        ]);
        $newRole = new userRoles();
        $newRole->role_name=$request->inputRole;
        $newRole->save();
        return redirect('/addNewUserRole');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\userRoles  $userRoles
     * @return \Illuminate\Http\Response
     */
    public function show(userRoles $userRoles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\userRoles  $userRoles
     * @return \Illuminate\Http\Response
     */
    public function edit(userRoles $userRoles,$id)
    {
        return view('userRolesView.editUserRole')->with('role',$userRoles::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\userRoles  $userRoles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, userRoles $userRoles)
    {
        // dd($request);
        $request->validate([
            'editInputRole'=>'required|min:4',
        ],[
            'editInputRole.min'=>'atleast 4 character allowed',
        ]);
        $role=$userRoles::find($request->InputRoleId);
        $role->role_name=$request->editInputRole;
        $isUpdated=$role->save();
        if($isUpdated){
            return redirect('addNewUserRole');
        }else{
            return redirect('editThsUserRole/'.$request->InputRoleId);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\userRoles  $userRoles
     * @return \Illuminate\Http\Response
     */
    public function destroy(userRoles $userRoles,$id)
    {
        $role=$userRoles::find($id);
        if($role->delete()){
            return redirect('addNewUserRole');
        }else{
            return redirect('/');
        }
    }
}
