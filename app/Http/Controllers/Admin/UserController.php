<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    //
    public function allUsers()
    {
        $title = 'Users';
        $users = User::with('roles','transactions','permissions','merchant','wallet')->orderBy('id', 'DESC')->get();
        
        return view('admin.user.all', compact('users', 'title'));
    }

    public function permission($id)
    {
        $user = User::findOrFail($id);
        $title = 'Permissions for '.$user->name;
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name','name')->all();

        return view('admin.user.permission', compact('user', 'roles','title', 'userRole'));
    }

    public function permissionUpdate($id, Request $request)
    {
        $this->validate($request, [
                                    'roles' => 'required'
                                ]);
                                
        $user = User::findOrFail($id);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($request->input('roles'));

        return redirect()->route('admin.user.all')->with('success','User Permissions Updated Successfully');
    }

    public function nopermission($id)
    {
        $user = User::findOrFail($id);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole(null);

        return redirect()->route('admin.user.all')->with('success','User Permissions Updated Successfully');

    }


    public function wallet(Request $request, $id)
    {
        $this->validate($request, [
            'deposit_withdraw' => 'required'
        ]);
      
        $user = User::findOrFail($id);
        $deposit_withdraw = $request->deposit_withdraw;

        if ($deposit_withdraw > 0) {
            $meta = [
                'name' => $user->name,
                'amount' => $deposit_withdraw, 
                'currency' => '$',
                'payment_id' => 'nothing',
                'payment_method' => 'Admin',
                'img' => null,
                'pdf' => null,
                'status' => 1,
            ];
            $user->depositFloat($deposit_withdraw, $meta, true);
        
            return redirect()->back()->with('success', 'User Wallet Balance Has Updated');

        } elseif ($deposit_withdraw < 0) {

            $deposit = $deposit_withdraw * -1;

            $meta = [
                'name' => $user->name,
                'amount' => $deposit, 
                'currency' => '$',
                'payment_id' => 'nothing',
                'payment_method' => 'Admin',
                'img' => null,
                'pdf' => null,
                'status' => 1,
            ];
            $user->forceWithdrawFloat($deposit, $meta, true);
            return redirect()->back()->with('success', 'User Wallet Balance Has Updated');

        } else {
            return back();
        }

    }




    public function changeStatus($id)
    {
        $user = User::findOrFail($id);
        $user->status = !$user->status;
        $user->update();

        return redirect()->back()->with('success', 'User Status have been Updated successfully');
    }


    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return back()->with('success','user has deleted');
    }
}
