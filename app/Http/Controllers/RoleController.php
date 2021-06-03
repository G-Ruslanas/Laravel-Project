<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    public function index(){

        return view('admin.roles.index',[
            'roles'=>Role::all()

        ]);

    }

    public function store(){
        \request()->validate([
            'name'=>['required']


        ]);

        Role::create([
            'name'=>Str::ucfirst(\request('name')),
            'slug'=>Str::of(Str::lower(\request('name')))->slug('-')
        ]);

        return back();

    }

    public function destroy(Role $role){

        $role->delete();
        session()->flash('role-deleted','Deleted Role');
        return back();

    }

    public function update(Role $role){

        $role->name = Str::ucfirst(\request('name'));
        $role->slug = Str::of(Str::lower(\request('name')))->slug('-');

//        if($role->isClean('name')){
//            session()->flash('role-updated','Role Updated');
//        }else {
//            session()->flash('role-updated','Nothing has been updated');
//        }

        $role->save();
        return redirect()->route('roles.index');

    }

    public function edit(Role $role){

        return view('admin.roles.edit',[
            'role'=>$role,
            'permissions'=>Permission::all()
        ]);

    }

    public function attach(Role $role){

        $role->permissions()->attach(\request('permission'));
        return back();

    }

    public function detach(Role $role){

        $role->permissions()->detach(\request('permission'));
        return back();

    }

}
