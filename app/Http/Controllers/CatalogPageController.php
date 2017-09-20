<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatalogPageController extends Controller
{
    public function __construct()
    {
        session_start();
    }

    public function catalog_page($alias)
    {
        $id_cat = DB::table('catalogs')->where('alias', $alias)->value('id');

        if ($_SESSION['lang'] == "RU")
        {
            $product = DB::table('products_and_services')->select('id','description_ru','parent')->where('parent','=',$id_cat)->first();
            $catalog = DB::table('catalogs')->select('id','alias','title_ru')->get();
            $news = DB::table('news')->select('id','title_ru','prev_text1_ru','date')->orderBy('date','desc')->take(2)->get();
            foreach($catalog as $item)
            {
                if ($item->id == $id_cat){
                    $title = $item->title_ru;
                    break;
                }
                else
                    $title = "Не найдено!";
            }
        }
        else
        {
            $product = DB::table('products_and_services') ->select('id','description_en','parent') ->where('parent','=',$id_cat) ->first();
            $catalog = DB::table('catalogs')->select('id','alias','title_en')->get();
            $news = DB::table('news')->select('id','title_en','prev_text1_en','date')->orderBy('date','desc')->take(2)->get();
            foreach($catalog as $item)
            {
                if ($item->id == $id_cat){
                    $title = $item->title_en;
                    break;
                }
                else
                    $title = "Not found!";
            }
        }
        $images = DB::table('catalog_images')->select('img')->where('parent',$id_cat)->get();
        $doc = DB::table('download')->select('path_doc')->first();
            
        return view('pages.catalog_page',['product'=>$product,'catalog'=>$catalog,'title' => $title,'news'=>$news,'images'=>$images,'doc'=>$doc]);
    }
}
