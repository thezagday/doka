<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SitemapController extends Controller
{
    public function __construct()
    {
        session_start();
    }
    public function sitemap()
    {
        if ($_SESSION['lang'] =="RU")
        {
            $menu = DB::table('menus')->select('title_ru','link','catalog')->get();
            $catalog = DB::table('catalogs')->select('title_ru','alias')->get();
            $news = DB::table('news')->select('id','title_ru')->orderBy('date')->take(10)->get();
        }
        else
        {
            $menu = DB::table('menus')->select('title_en','link','catalog')->get();
            $catalog = DB::table('catalogs')->select('title_en','alias')->get();
            $news = DB::table('news')->select('id','title_en')->orderBy('date')->take(10)->get();
        }
        return view('pages.sitemap',['menu'=>$menu,'catalog'=>$catalog,'news'=>$news]);
    }
}
