<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct()
    {
        session_start();
    }

    public function login(Request $request)
    {
        if (!$request->all())
        {
            return view ('admin_pages.auth.login');
        }
        else
        {
            $admin = DB::table('users')->value('name');
            $password = DB::table('users')->value('password');

            if ($request->input('login')== $admin && Hash::check($request->input('password'),$password))
            {
                $_SESSION['admin'] = true;
                return redirect()->action('AdminController@admin');
            }
            else
            {
                return redirect()->action('AuthController@login');
            }
        }
    }
    public function logout(Request $request)
    {
        if ($request->all())
        {
            unset($_SESSION['admin']);
            session_destroy();
            return redirect()->action('AuthController@login');
        }
    }
}
