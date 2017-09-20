<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LangController extends Controller
{
    public function __construct()
    {
        session_start();
    }

    public function lang()
    {
        $_SESSION['lang'] == "RU" ? $_SESSION['lang'] = "EN":$_SESSION['lang'] = "RU";
        return redirect()->action("HomeController@home");
    }
}
