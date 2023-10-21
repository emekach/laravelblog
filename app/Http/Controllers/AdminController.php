<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Admin;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function Logout()
    {
        Auth::guard('admin')
            ->logout();
        return redirect()
            ->route('admin.login_from')
            ->with('error', 'You have been Logged out successfully');
    }
}
