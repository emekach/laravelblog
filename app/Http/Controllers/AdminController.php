<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class AdminController extends Controller
{
    public function Dashboard()
    {
        return view('admin.index');
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
