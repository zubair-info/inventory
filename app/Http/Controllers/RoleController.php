<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RoleController extends Controller
{
    //
    public function role_manager()
    {
        $roles = Role::all();
        $permission = Permission::all();
        $users = User::all();
        return view('admin.role.index', [
            'permission' => $permission,
            'roles' => $roles,
            'users' => $users,
        ]);
    }

    // add permission
    public function add_permission(Request $request)
    {

        $request->validate([
            'permission_name' => 'required',
        ]);
        $permission = Permission::create(['name' => $request->permission_name]);
        $notification = array(
            'message' => 'Add Permission Sucessfully!',
            'alert-type' => 'info'
        );
        return back()->with($notification);
    }
    //edit permission

    public function edit_permissions($role_id)
    {
        $permissions = Permission::all();
        $role_info = Role::find($role_id);
        return view('admin.role.edit_permission', [
            'permissions' => $permissions,
            'role_info' => $role_info,
        ]);
    }

    // add role
    public function add_role(Request $request)
    {
        $request->validate([
            'role_name' => 'required',
        ]);
        $role = Role::create(['name' => $request->role_name]);
        $role->givePermissionTo($request->permission);
        $notification = array(
            'message' => 'Add Role Sucessfully!',
            'alert-type' => 'info'
        );
        return back()->with($notification);
    }

    // assign role
    public function assign_role(Request $request)
    {
        $user = User::find($request->user_id);
        $user->assignRole($request->role_id);
        return back();
    }

    // edit permisssion
    // public function edit_role_permissions($user_id)
    // {
    //     $permissions = Permission::all();
    //     $user_info = User::find($user_id);
    //     return view('admin.role.edit_role_permission', [
    //         'permissions' => $permissions,
    //         'user_info' => $user_info,
    //     ]);
    // }
    // update  permission
    public function update_permission(Request $request)
    {

        $role = Role::find($request->role_id);
        $role->syncPermissions($request->permission);

        $notification = array(
            'message' => 'Role Permission Update Sucessfully!',
            'alert-type' => 'info'
        );
        return redirect()->to('role/manager/')->with($notification);
    }

    // update role and  permission user list
    // public function update_role_permission(Request $request)
    // {

    //     $user = User::find($request->user_id);
    //     $user->syncPermissions($request->permission);
    //     return redirect()->route('role.manager');
    // }

    // remove  role and permission user_id  list
    public function role_permission($user_id)
    {
        $user = User::find($user_id);
        $user->roles()->detach();
        return back();
    }

    public function delete_role_permission($role_id)
    {
        $role = Role::find($role_id);
        $role->delete();
        return back();
    }
}
