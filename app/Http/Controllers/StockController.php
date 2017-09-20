<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class StockController extends Controller
{
    public function __construct()
    {
        session_start();
    }
    public function stock()
    {
        if ($_SESSION['lang'] == "RU")
        {
            $stock = DB::table('stocks')->select('title_ru','desc_ru')->first();
        }
        else
        {
            $stock = DB::table('stocks')->select('title_en','desc_en')->first();
        }
        return view ('pages.stock',['stock'=>$stock]);
    }
}
