<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;


class SearchController extends Controller
{
    public function __construct()
    {
        session_start();
    }
    public function search()
    {
        $line = Input::get('line');
        if ($_SESSION['lang'] =="RU")
        {
            $results = DB::table('news')->select('id','title_ru','prev_text1_ru')->where('title_ru','like','%'.$line.'%')->paginate(10)->setPath("?line=$line");
        }
        else
        {
            $results = DB::table('news')->select('id','title_en','prev_text1_en')->where('title_en','like','%'.$line.'%')->paginate(10)->setPath("?line=$line");
        }
        return view('pages.search_results',['results'=>$results,'line'=>$line]);
    }
}
