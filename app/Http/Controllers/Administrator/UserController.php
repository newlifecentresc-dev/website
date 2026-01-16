<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function profile()
    {
        return view('administrator.pages.user.profile');
    }


    public function update_profile(Request $request)
    {
        $validated = $this->validateRequest();

        return (User::where('id', auth()->user()->id)->update($validated))
            ? back()->with('success', 'Profile successfully updated')
            : back()->with('error', 'Error updating profile!');
    }

    private function validateRequest()
    {
        return request()->validate([
            'name'              =>  'required|string',
            'email'             =>  'required|string',
        ]);
    }

    public function password()
    {
        return view('administrator.pages.user.password');
    }

    public function change_password(Request $request)
    {
        $request->validate([
            'new_password' => 'nullable|min:9',
        ]);

        $hashPassword = Auth::user()->password;

        if (Hash::check($request->old_password, $hashPassword)) {
            if (!Hash::check($request->new_password, $hashPassword)) {
                User::where('id', auth()->user()->id)->update([
                    'password' => Hash::make($request->new_password)
                ]);
                return back()->with('success', 'Password updated successfully');
            } else {
                return back()->with('error', 'New password cannot be the same with old password');
            }
        } else {
            return back()->with('error', 'Old password does not match');
        }
    }
}
