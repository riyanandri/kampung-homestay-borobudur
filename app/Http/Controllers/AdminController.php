<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function adminDashboard()
    {
        return view('admin.index');
    }

    public function adminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function adminLogin()
    {
        return view('admin.admin_login');
    }

    public function adminProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);

        return view('admin.admin_profile', compact('profileData'));
    }

    public function adminProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/' . $data->photo));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data['photo'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Profil Admin berhasil diperbarui',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function adminChangePassword()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        
        return view('admin.admin_change_password', compact('profileData'));
    }

    public function adminPasswordUpdate(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);

        if (!Hash::check($request->old_password, Auth::user()->password)) {
            $notification = array(
                'message' => 'Password lama tidak sesuai!',
                'alert-type' => 'error'
            );

            return back()->with($notification);
        }

        User::whereId(Auth::user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        $notification = array(
            'message' => 'Password berhasil diperbarui',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    public function allAdmin()
    {
        $alladmin = User::where('role', 'admin')->get();

        return view('backend.admin.all_admin', compact('alladmin'));
    }

    public function addAdmin()
    {
        $roles = Role::all();
        return view('backend.admin.add_admin', compact('roles'));
    }

    public function storeAdmin(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->role = 'admin';
        $user->status = 'active';
        $user->save();

        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        $notification = array(
            'message' => 'Admin user created successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.admin')->with($notification);
    }

    public function editAdmin($id)
    {
        $user = User::find($id);
        $roles = Role::all();

        return view('backend.admin.edit_admin', compact('user', 'roles'));
    }

    public function updateAdmin(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->role = 'admin';
        $user->status = 'active';
        $user->save();

        $user->roles()->detach();
        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        $notification = array(
            'message' => 'Admin user updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.admin')->with($notification);
    }

    public function deleteAdmin($id)
    {
        $user = User::find($id);
        
        if (!is_null($user)) {
            $user->delete();
        }

        $notification = array(
            'message' => 'Admin user deleted successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
