<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Admin;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function Dashboard()
    {
        $category = Category::count();
        $posts = Post::count();
        $users = User::count();
        $admin = Admin::count();
        return view('admin.index', [
            'category' => $category,
            'posts' => $posts,
            'users' => $users,
            'admin' => $admin
        ]);
    }

    public function Login(Request $request)
    {
        $check = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt([
            'email' => $check['email'],
            'password' => $check['password'],
        ])) {
            $user = Auth::guard('admin')->user()->name;
            return redirect()
                ->route('admin.dashboard')
                ->with('error', 'Welcome ' . $user . ', You have Logged in successfully');
        } else {
            return back()
                ->with('error', 'Invalid Credentials');
        }
    }

    public function UpdatePassword(Request $request)
    {

        $validateData = $request->validate([
            'old_password' => ['required', function ($attribute, $value, $fail) {
                if (!Hash::check($value, Auth::guard('admin')->user()->password)) {
                    return $fail('The provided old password is incorrect.');
                }
            }],
            'new_password' => 'required|string|min:4',
            'confirm_password' => 'required|same:new_password'
        ]);

        $hashedPassword = Auth::guard('admin')->user()->password;
        if (Hash::check($request->old_password, $hashedPassword)) {
            $users = Admin::find(Auth::guard('admin')->id());
            $users->password = bcrypt($request->new_password);
            $users->save();


            return redirect()->back()->with('message', 'Password Updated Successfully');
        } else {

            return redirect()->back()->with('message', 'Old Password is not match');
        }
    } // End Method

    public function Logout()
    {
        Auth::guard('admin')
            ->logout();
        return redirect()
            ->route('admin.login_from')
            ->with('error', 'You have been Logged out successfully');
    }
}
