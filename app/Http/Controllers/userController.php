<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\userRoles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Contracts\Service\Attribute\Required;

class userController extends Controller
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
        $users=user::all();
        return view('userRolesView.showAllUsers')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $userRoles=userRoles::all();
        return view('userRolesView.addNewUser')->with('userRoles',$userRoles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            "name" => 'required|min:3|max:30|string',
            "email" => 'required|min:4|max:60|string|unique:users,email',
            "password" =>'string|required|min:8|string',
            "password_confirmation" =>'string|required|min:8|string',
            "role_id" =>'required|numeric'
        ],[
            'min.name'=>'name must be between 3 and 30 characters',
            'password.min'=>'password must be atleast 8 character'
        ]);
        // dd($request);
        if($request->password === $request->password_confirmation){
            // dd($request);
            $isAdded=User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'role_id'=>$request['role_id'],
            ]);
            if($isAdded){
                return redirect('/pingProject/showAllUsers');
            }else{
                abort(809,"ServerError");
            }
        }else{
            return redirect('/pingProject/addNewUser')->with('error','confirm password is mismatched');
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
        $user=user::find($id);
        
        // dd($user->userRoles->role_name);
        return view('userRolesView.focusOneUser')->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=user::find($id);
        return view('userRolesView.editUser')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);
        $user=user::find($request->user_id);
        // dd($user);
        $user->name=$request->name;
        $user->email=$request->email;
        $isUpdated=$user->save();
        if($isUpdated){
            return  redirect('/pingProject/focusUser/'.$request->user_id);
        }else{
            return redirect("/editUser/".$request->user_id);
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
        $user=user::find($id);
        $isDeleted=$user->delete();
        if($isDeleted){
            return  redirect('/pingProject/showAllUsers');
        }else{
            return redirect('/pingProject/focusUser'.$id);
        }
        
    }
}
