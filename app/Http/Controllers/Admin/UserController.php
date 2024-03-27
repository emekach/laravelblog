<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.user.index', [
            'users' => $users
        ]);
    } // ENd MEthod

    public function edit($user_id){
        $user=User::find($user_id);
        
        return view('admin.user.edit',[
            'user'=>$user
        ]);
    }
    
}
