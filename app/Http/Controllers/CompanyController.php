<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class CompanyController extends Controller
{
    public function __construct()
    {
        session_start();
    }

    public function company()
    {
        if ($_SESSION['lang'] == "RU")
        {
            $company = DB::table('companies')->select('title_ru','desc_ru','video')->first();
            $news = DB::table('news')->select('id','title_ru','prev_text1_ru','prev_text2_ru','img','date')->take(4)->get();
            $certificates = DB::table('certificate_and_licenses')->where('doc','=',0)->take(4)->get();
        }
        else
        {
            $company = DB::table('companies')->select('title_en','desc_en','video')->first();
            $news = DB::table('news')->select('id','title_en','prev_text1_en','prev_text2_en','img','date')->take(4)->get();
            $certificates = DB::table('certificate_and_licenses')->where('doc','=',0)->take(4)->get();
        }
        return view('pages.company',['company'=>$company,'news'=>$news,'certificates'=>$certificates]);
    }
}
