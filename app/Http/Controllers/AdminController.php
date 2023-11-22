<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    use ImageUploadTrait;
    public function adminProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::findOrFail($id);
        return view('admin.profile.profile', compact('profileData'));
    }
    
    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'image' => ['nullable', 'max:4196', 'image'],
            'name' => ['required', 'max:30'],
            'email' => ['required', 'email'],
        ]);

        $admin = User::findOrFail($id);

        $imagePath = $this->updateImage($request, 'image', 'uploads', $admin->image);

        $admin->image = empty(!$imagePath) ? $imagePath : $admin->image;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->save();

        $notification = array(
            'message' => 'User Updated Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('profile')->with($notification);
    }
    public function changePassword()
    {
        $id = Auth::user()->id;
        $profileData = User::findOrFail($id);
        return view('admin.profile.change_password', compact('profileData'));
    }
    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);

        if (!Hash::check($request->old_password, auth::user()->password)) {
            $notification = array(
                'message' => 'Old Password Does Not Match!',
                'alert-type' => 'error',
            );
            return back()->with($notification);
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        $notification = array(
            'message' => 'Password Changed Successfully!',
            'alert-type' => 'success',
        );
        return back()->with($notification);
    }
}
