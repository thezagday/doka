<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        session_start();
        if (!isset($_SESSION['lang']))
        {
            $_SESSION['lang'] = 'RU';
        }
    }

    public function home()
    {
        if ($_SESSION['lang'] == "RU")
        {
            $catalog = DB::table('catalogs')->select('id','alias','title_ru','desc_ru','img')->get();
            $sliders = DB::table('sliders')->select('title_ru','desc_ru','img')->get();
            $news = DB::table('news')->select('id','title_ru','prev_text1_ru','date')->orderBy('date','desc')->take(4)->get();
            $company = DB::table('companies')->select('video','prev_text_ru')->first();
        }
        else
        {
            $catalog = DB::table('catalogs')->select('id','alias','title_en','desc_en','img')->get();
            $sliders = DB::table('sliders')->select('title_en','desc_en','img')->get();
            $news = DB::table('news')->select('id','title_en','prev_text1_en','date')->orderBy('date','desc')->take(4)->get();
            $company = DB::table('companies')->select('video','prev_text_en')->first();
        }
        return view('pages.home',['catalog'=>$catalog,'sliders' => $sliders,'news'=>$news,'company' =>$company]);
    }
}
