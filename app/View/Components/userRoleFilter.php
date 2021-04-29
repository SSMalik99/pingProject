<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\userRoles;
use GuzzleHttp\Psr7\Request;


class userRoleFilter extends Component
{
    protected $users;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(){
        
    }
    public function showWithRole($id){
        $this->users=userRoles::find($id)->users;
        // dd($this->users);
        return view('userRolesView.showAllUsers')->with('users',$this->users);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $userRoles=userRoles::all();
        return view('components.user-role-filter')->with('userRoles',$userRoles);

    }
}
