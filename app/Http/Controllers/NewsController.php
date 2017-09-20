<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class NewsController extends Controller
{
    public function __construct()
    {
        session_start();
    }
    public function news()
    {
        if ($_SESSION['lang'] == "RU")
        {
            $news = DB::table('news')->select('id','title_ru','prev_text2_ru','date')->orderBy('date','desc')->paginate(10);
        }
        else
        {
            $news = DB::table('news')->select('id','title_en','prev_text2_en','date')->orderBy('date','desc')->paginate(10);
        }

        return view('pages.news',['news'=>$news]);
    }
    public function news_page(Request $request)
    {
        $id = $request->input('id');
        if ($_SESSION['lang'] == "RU")
        {
            $item_news = DB::table('news')->select('title_ru','prev_text1_ru','prev_text2_ru','desc_ru','date','img')->where('id','=',$id)->first();
            $news = DB::table('news')->select('id','title_ru','prev_text1_ru','prev_text2_ru','desc_ru','date','img')->where('id','<>',$id)->orderBy('date','desc')->get();

        }
        else
        {
            $item_news = DB::table('news')->select('title_en','prev_text1_en','prev_text2_en','desc_en','date','img')->where('id','=',$id)->first();
            $news = DB::table('news')->select('id','title_en','prev_text1_en','prev_text2_en','desc_en','date','img')->where('id','<>',$id)->orderBy('date','desc')->get();

        }
        return view('pages.news_page',['news'=>$news,'item_news'=>$item_news]);
    }
}
