<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //
    public function index(){

        $users = User::all();
        return view('admin.users.index',['users'=>$users]);

    }

    public function destroy(User $user){

        $user->delete();
        session()->flash('user-deleted','User has been deleted');
        return redirect()->route('users.index');

    }


    public function edit(User $user){
        return view('admin.users.profile',['user'=>$user]);
    }


    public function show(User $user){

        return view('admin.users.profile', [
            'user'=>$user,
            'roles'=>Role::all()

        ]);

    }

    public function update(User $user){
        $inputs = \request()->validate([
            'username'=>['required','string','max:255','alpha_dash'],
            'name'=>['required','string','max:255'],
            'email'=>['required','email','max:255'],
            'avatar'=>['file','mimes:jpeg,png','max:2000'],
            'password'=>['min:6','max:255','confirmed'],
        ]);
        if(\request('avatar')){
            $inputs['avatar'] = \request('avatar')->store('images');

        }

        $user->update($inputs);
        $user->roles()->sync(\request('role'));
        Session::flash('profile-updated-message','User profile was updated');
        if(auth()->user()->userHasRole('Admin')){
            return redirect()->route('users.index');

        }else{
            return redirect()->route('admin.index');
        }

    }

//    public function attach(User $user){
//
//        $user->roles()->attach(\request('role'));
//        return back();
//
//    }

//    public function detach(User $user){
//
//        $user->roles()->detach(\request('role'));
//        return back();
//
//    }

}
