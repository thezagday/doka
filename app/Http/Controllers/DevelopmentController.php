<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DevelopmentController extends Controller
{
    public function __construct()
    {
        session_start();
    }
    public function development()
    {
        if ($_SESSION['lang'] == "RU")
        {
            $developments = DB::table('developments')->select('title_ru','desc_ru')->first();
        }
        else
        {
            $developments = DB::table('developments')->select('title_en','desc_en')->first();
        }
        $images = DB::table('developments_images')->select('img')->get();
        return view('pages.development',['developments' => $developments,'images'=>$images]);
    }
}
