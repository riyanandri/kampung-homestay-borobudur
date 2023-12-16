<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Exports\PermissionExport;
use App\Imports\PermissionImport;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function allPermission()
    {
        $permissions = Permission::orderBy('name', 'ASC')->get();
        return view('backend.role.all_permission', compact('permissions'));
    }

    public function addPermission()
    {
        return view('backend.role.add_permission');
    } 

    public function storePermission(Request $request)
    {
        $permission = Permission::create([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);

        $notification = array(
            'message' => 'Permission Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.permission')->with($notification); 
    }

    public function editPermission($id)
    {
        $permission = Permission::find($id);

        return view('backend.role.edit_permission',compact('permission'));
    }

    public function updatePermission(Request $request)
    {
        $per_id = $request->id;

        Permission::find($per_id)->update([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);

        $notification = array(
            'message' => 'Permission Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.permission')->with($notification); 
    }

    public function deletePermission($id)
    {
        Permission::find($id)->delete();

        $notification = array(
            'message' => 'Permission Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 
    }

    public function allRoles()
    {
        $roles = Role::latest()->get();
        return view('backend.role.all_roles', compact('roles'));
    }

    public function addRoles()
    {
        return view('backend.role.add_roles');
    } 

    public function storeRoles(Request $request)
    {
        Role::create([
            'name' => $request->name,
        ]);

        $notification = array(
            'message' => 'Roles Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.roles')->with($notification); 
    }

    public function editRoles($id)
    {
        $roles = Role::find($id);

        return view('backend.role.edit_roles',compact('roles'));
    }

    public function updateRoles(Request $request)
    {
        $role_id = $request->id;

        Role::find($role_id)->update([
            'name' => $request->name,
        ]);

        $notification = array(
            'message' => 'Roles Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.roles')->with($notification); 
    }

    public function deleteRoles($id)
    {
        Role::find($id)->delete();

        $notification = array(
            'message' => 'Roles Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 
    }

    public function importPermission()
    {
        return view('backend.role.import_permission');
    }

    public function export()
    {
        return Excel::download(new PermissionExport, 'permission.xlsx');
    }

    public function import(Request $request)
    {
        Excel::import(new PermissionImport, $request->file('import_file'));
        $notification = array(
            'message' => 'Permission Imported Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.permission')->with($notification);
    }

    public function addRolesPermission(){

        $roles = Role::all();
        $permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();

        return view('backend.role.add_roles_permission',compact('roles','permissions','permission_groups'));
    }

    public function rolePermissionStore(Request $request)
    {
        $data = array();
        $permissions = $request->permission;

        foreach ($permissions as $key => $item) {
            $data['role_id'] = $request->role_id;
            $data['permission_id'] = $item;

            DB::table('role_has_permissions')->insert($data);
        } // end foreach

        $notification = array(
            'message' => 'Role Permission Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.roles.permission')->with($notification);   
    }

    public function allRolesPermission()
    {
        $roles = Role::all();

        return view('backend.role.all_roles_permission',compact('roles'));
    }

    public function adminEditRoles($id)
    {
        $role = Role::find($id);
        $permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();

        return view('backend.role.edit_roles_permission',compact('role','permissions','permission_groups'));
    }

    public function adminRolesUpdate(Request $request,$id)
    {
        $role = Role::find($id);
        $permissions = $request->permission;

        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        }

        $notification = array(
            'message' => 'Role Permission Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.roles.permission')->with($notification); 
    }

    public function adminDeleteRoles($id){

        $role = Role::find($id);
        if (!is_null($role)) {
           $role->delete();
        }

        $notification = array(
            'message' => 'Role Permission Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }
}
