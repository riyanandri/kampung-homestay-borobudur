<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function allPermission()
    {
        $permissions = Permission::latest()->get();
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
}
