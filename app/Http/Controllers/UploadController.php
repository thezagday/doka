<?php

namespace App\Http\Controllers;

use App\Catalog;
use App\Download;
use App\News;
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class UploadController extends Controller
{
    public function __construct()
    {
        session_start();
    }
    
    public function update_item_slider(Request $request)
    {
        $slider = Slider::find(Input::get('id'));
        $img = $slider->img;

        if ($request->hasFile('img'))
        {
            $file = $request->file('img');
            $file->move(public_path() . '/images/slider',$file->getClientOriginalName());

            $slider->update([
                'img' => '/images/slider/'.$file->getClientOriginalName(),
                'title_ru' => Input::get('title_ru'),
                'title_en' => Input::get('title_en'),
                'desc_ru' => Input::get('desc_ru'),
                'desc_en' => Input::get('desc_en'),
            ]);

            if ($img != null)
            {
                if(!DB::table('sliders')->where('img','like',$img)->first())
                {
                    if (file_exists(public_path() .$img))
                    {
                        unlink(public_path() .$img);
                    }
                }
            }
        }
        else
        {
            $slider->update([
                'title_ru' => Input::get('title_ru'),
                'title_en' => Input::get('title_en'),
                'desc_ru' => Input::get('desc_ru'),
                'desc_en' => Input::get('desc_en'),
            ]);
        }
        return redirect()->action('AdminController@read_slider');
    }
    public function add_slider(Request $request)
    {
        if (!(Input::all()))
        {
            return view ('admin_pages.slider.add_slider');
        }
        elseif ($request->hasFile('img'))
        {
            $file = $request->file('img');
            $file->move(public_path().'/images/slider',$file->getClientOriginalName());
            $img = '/images/slider/'.$file->getClientOriginalName();
        }
        else
        {
            $img = '';
        }

        DB::table('sliders')->insert([
            'img' => $img,
            'title_ru' => Input::get('title_ru'),
            'title_en' => Input::get('title_en'),
            'desc_ru'  => Input::get('desc_ru'),
            'desc_en'  => Input::get('desc_en'),
        ]);
        return redirect()->action('AdminController@read_slider');
    }
    
    public function update_catalog(Request $request)
    {
        $item_catalog = Catalog::find(Input::get('id'));
        $img = $item_catalog->img;

        if(DB::table('catalogs')->where('alias','like',Input::get('alias'))->where('id','<>',Input::get('id'))->first())
        {
            $error = 'Такой алиас уже существует! Пожалуйста, введите другой.';
            return redirect()->action('AdminController@edit_catalog', ['alias' => $item_catalog->alias,'error'=>$error]);
        }
        if ($request->hasFile('img'))
        {
            $file = $request->file('img');
            $file->move(public_path() . '/images/catalog',$file->getClientOriginalName());

            $item_catalog->update([
                'img' => '/images/catalog/'.$file->getClientOriginalName(),
                'title_ru' => Input::get('title_ru'),
                'title_en' => Input::get('title_en'),
                'desc_ru' => Input::get('desc_ru'),
                'desc_en' => Input::get('desc_en'),
                'alias' => Input::get('alias')
            ]);

            if ($img != null)
            {
                if(!DB::table('catalogs')->where('img','like',$img)->first())
                {
                    if (file_exists(public_path() .$img))
                    {
                        unlink(public_path() .$img);
                    }
                }
            }
        }
        else
        {
            $item_catalog->update([
                'title_ru' => Input::get('title_ru'),
                'title_en' => Input::get('title_en'),
                'desc_ru' => Input::get('desc_ru'),
                'desc_en' => Input::get('desc_en'),
                'alias' => Input::get('alias')
            ]);
        }
        return redirect()->action('AdminController@edit_catalog', ['alias' => Input::get('alias')]);
    }
    public function update_material_catalog(Request $request)
    {
        DB::table('products_and_services')
            ->where('parent',Input::get('parent'))
            ->update([
                'description_ru' => Input::get('description_ru'),
                'description_en' => Input::get('description_en')
            ]);

        if ($request->hasFile('img'))
        {
            $file = $request->file('img');
            $file->move(public_path() . '/images/catalog_images',$file->getClientOriginalName());

            DB::table('catalog_images')->insert([
                'img' => '/images/catalog_images/'.$file->getClientOriginalName(),
                'parent' => Input::get('parent'),
            ]);
        }
        $alias = DB::table('catalogs')->where('id',Input::get('parent'))->value('alias');

        return redirect()->action('AdminController@edit_material_catalog',['alias'=>$alias]);
    }
    public function add_catalog(Request $request)
    {
        if (!$request->all() || Input::get('error'))
        {
            if (Input::get('error'))
            {
                return view('admin_pages.catalog.add_catalog',['error'=>Input::get('error')]);
            }
            else
            {
                return view('admin_pages.catalog.add_catalog');
            }

        }
        elseif ($request->hasFile('img'))
        {
            $file = $request->file('img');
            $file->move(public_path().'/images/catalog',$file->getClientOriginalName());
            $img = '/images/catalog/'.$file->getClientOriginalName();
        }
        else
        {
            $img = '';
        }
        if(DB::table('catalogs')->where('alias','like',Input::get('alias'))->first())
        {
            $error = 'Такой алиас уже существует! Пожалуйста, введите другой.';
            return redirect()->action('UploadController@add_catalog',['error'=>$error]);
        }
        DB::table('catalogs')->insert([
            'img'      => $img,
            'title_ru' => Input::get('title_ru'),
            'title_en' => Input::get('title_en'),
            'desc_ru'  => Input::get('desc_ru'),
            'desc_en'  => Input::get('desc_en'),
            'alias'    => Input::get('alias')
        ]);

        $parent = DB::table('catalogs')->where('alias',Input::get('alias'))->value('id');

        DB::table('products_and_services')->insert([
            'description_ru'  => 'Текст по умолчанию',
            'description_en'  => 'Default text',
            'parent'    => $parent
        ]);
        return redirect()->action('AdminController@read_catalog');
    }
    
    public function update_developments(Request $request)
    {
        DB::table('developments')
            ->where('id',Input::get('id'))
            ->update([
                'title_ru' => Input::get('title_ru'),
                'title_en' => Input::get('title_en'),
                'desc_ru' => Input::get('desc_ru'),
                'desc_en' => Input::get('desc_en')
            ]);

        if ($request->hasFile('img'))
        {
            $file = $request->file('img');
            $file->move(public_path() . '/images/developments',$file->getClientOriginalName());

            DB::table('developments_images')->insert([
                'img' => '/images/developments/'.$file->getClientOriginalName(),
            ]);
        }

        return redirect()->action('AdminController@read_developments');
    }
    
    public function update_item_news(Request $request)
    {
        $item_news = News::find(Input::get('id'));
        $img = $item_news->img;
        if (Input::get('date'))
        {
            $date = explode("/",Input::get('date'));
            $item_news->update([
                'date' =>$date[2].'-'.$date[0].'-'.$date[1]
            ]);
        }

        if ($request->hasFile('img'))
        {
            $file = $request->file('img');
            $file->move(public_path() . '/images/news',$file->getClientOriginalName());

            $item_news->update([
                'img' => '/images/news/'.$file->getClientOriginalName(),
                'title_ru' => Input::get('title_ru'),
                'title_en' => Input::get('title_en'),
                'prev_text1_ru' => Input::get('prev_text1_ru'),
                'prev_text1_en' => Input::get('prev_text1_en'),
                'prev_text2_ru' => Input::get('prev_text2_ru'),
                'prev_text2_en' => Input::get('prev_text2_en'),
                'desc_ru' => Input::get('desc_ru'),
                'desc_en' => Input::get('desc_en'),
            ]);

            if ($img != null)
            {
                if(!DB::table('news')->where('img','like',$img)->first())
                {
                    if (file_exists(public_path() .$img))
                    {
                        unlink(public_path() .$img);
                    }
                }
            }
        }
        else
        {
            $item_news->update([
                'title_ru' => Input::get('title_ru'),
                'title_en' => Input::get('title_en'),
                'prev_text1_ru' => Input::get('prev_text1_ru'),
                'prev_text1_en' => Input::get('prev_text1_en'),
                'prev_text2_ru' => Input::get('prev_text2_ru'),
                'prev_text2_en' => Input::get('prev_text2_en'),
                'desc_ru' => Input::get('desc_ru'),
                'desc_en' => Input::get('desc_en'),
            ]);
        }
        return redirect()->action('AdminController@edit_item_news',['id'=>Input::get('id')]);
    }
    public function add_news(Request $request)
    {
        if (!(Input::all()))
        {
            return view ('admin_pages.news.add_news');
        }
        elseif ($request->hasFile('img'))
        {
            $file = $request->file('img');
            $file->move(public_path().'/images/news',$file->getClientOriginalName());
            $img = '/images/news/'.$file->getClientOriginalName();
        }
        else
        {
            $img = '';
        }

        DB::table('news')->insert([
            'img' => $img,
            'title_ru' => Input::get('title_ru'),
            'title_en' => Input::get('title_en'),
            'prev_text1_ru' => Input::get('prev_text1_ru'),
            'prev_text1_en' => Input::get('prev_text1_en'),
            'prev_text2_ru' => Input::get('prev_text2_ru'),
            'prev_text2_en' => Input::get('prev_text2_en'),
            'desc_ru'  => Input::get('desc_ru'),
            'desc_en'  => Input::get('desc_en'),
            'date' => Input::get('date')
        ]);
        return redirect()->action('AdminController@read_news');
    }

    public function add_certificates(Request $request)
    {
        if ($request->hasFile('img_cert'))
        {
            $file = $request->file('img_cert');
            $file->move(public_path().'/images/certificates',$file->getClientOriginalName());
            $img = '/images/certificates/'.$file->getClientOriginalName();
            $doc = 0; // 0 - сертификат, 1 - лицензия

            DB::table('certificate_and_licenses')->insert([
                'img' => $img,
                'doc' => $doc
                ]);
        }

        if ($request->hasFile('img_lic'))
        {
            $file = $request->file('img_lic');
            $file->move(public_path().'/images/certificates',$file->getClientOriginalName());
            $img = '/images/certificates/'.$file->getClientOriginalName();
            $doc = 1; // 0 - сертификат, 1 - лицензия

            DB::table('certificate_and_licenses')->insert([
                'img' => $img,
                'doc' => $doc
            ]);
        }

        return redirect()->action('AdminController@read_certificates');
    }
    
    public function add_document(Request $request)
    {
        $item_doc = Download::find(Input::get('id'));
        $path = $item_doc->path_doc;

        if ($request->hasFile('path_doc'))
        {
            $file = $request->file('path_doc');
            $file->move(public_path() . '/files',$file->getClientOriginalName());

            $item_doc->update([
                'path_doc' => '/files/'.$file->getClientOriginalName()
            ]);

            if ($path != null)
            {
                if (file_exists(public_path() .$path))
                {
                    unlink(public_path() .$path);
                }
            }
        }

        return redirect()->action('AdminController@read_document');
    }

}
