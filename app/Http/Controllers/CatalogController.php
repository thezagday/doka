<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CatalogController extends Controller
{
    public function __construct()
    {
        session_start();
    }
    public function catalog()
    {
        if ($_SESSION['lang'] == "RU")
        {
            $catalog = DB::table('catalogs')->select('id','title_ru','desc_ru','img','alias')->get();
        }
        else
        {
            $catalog = DB::table('catalogs')->select('id','title_en','desc_en','img','alias')->get();
        }
        return view('pages.catalog',['catalog' => $catalog]);
    }
}
