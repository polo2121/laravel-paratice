<?php

namespace App\Http\Controllers;

use App\Http\Requests\userAuth;
use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;



class LoginController extends Controller
{
    //
    public static function login()
    {
        return View('login');
    }
    public static function registration()
    {
        return View('register');
    }
    public static function authLogin(userAuth $request)
    {
        return redirect(route('index', App::getLocale()));
    }
    public static function validateRegister(Request $request)
    {
        Login::validateData($request);
        return "Hello World";
    }
}
