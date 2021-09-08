<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    /*** Display a listing of the resource.** @return \Illuminate\Http\Response*/
    function __construct()
    {
        // $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
        // $this->middleware('permission:role-create', ['only' => ['create','store']]);
        // $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
        // $this->middleware('permission:role-delete', ['only' => ['destroy']]);
        $this->middleware(['permission:Users']);
    }

        /*** Display a listing of the resource.** @return \Illuminate\Http\Response*/
    public function index(Request $request)
    {
        $title = "Permissions";
        $roles = Role::orderBy('id','DESC')->get();
        return view('admin.role.index',compact('roles','title'));
    }



    /*** Show the form for creating a new resource.** @return \Illuminate\Http\Response*/
    public function create()
    {
        $title = 'Create New Permission';
        $permission = Permission::get();
        return view('admin.role.create',compact('title','permission'));
    }
    /*** Store a newly created resource in storage.** @param  \Illuminate\Http\Request  $request* @return \Illuminate\Http\Response*/
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);
        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));

        return redirect()->route('admin.roles.index')->with('success','Role created successfully');
    }



    /*** Display the specified resource.** @param  int  $id* @return \Illuminate\Http\Response*/
    public function show($id){

    }
    
    
    
    /*** Show the form for editing the specified resource.** @param  int  $id* @return \Illuminate\Http\Response*/
    public function edit($id)
    {

        $role = Role::find($id);
        $title = "$role->name Permissions";
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")
                                    ->where("role_has_permissions.role_id", $id)
                                    ->pluck('role_has_permissions.permission_id'
                                    ,'role_has_permissions.permission_id')
                                    ->all();
        return view('admin.role.edit',compact('role','permission','rolePermissions', 'title'));
    }



    /*** Update the specified resource in storage.** @param  \Illuminate\Http\Request  $request* @param  int  $id* @return \Illuminate\Http\Response*/
    public function update(Request $request, $id)
    {
        $this->validate($request,[
                                    'name' => 'required',
                                    'permission' => 'required',
                                    ]);
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();


        $role->syncPermissions($request->input('permission'));
        return redirect()->route('admin.roles.index')->with('success','Role updated successfully');
    }



    /*** Remove the specified resource from storage.** @param  int  $id* @return \Illuminate\Http\Response*/
    public function destroy($id)
    {
        DB::table("roles")->where('id',$id)->delete();
        return redirect()->route('admin.roles.index')->with('success','Role deleted successfully');
    }
}
