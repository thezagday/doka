<?php

namespace App\Http\Controllers;

use App\CatalogImage;
use App\CertificateAndLicense;
use App\Contacts;
use App\DevelopmentsImages;
use App\Menu;
use App\News;
use App\Slider;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

// за админ. часть отвечает isAdminMiddleware, подключенное в Kernel.php и Web.php

class AdminController extends Controller
{
    public function __construct()
    {
        session_start();
        if (!isset($_SESSION['lang']))
        {
            $_SESSION['lang'] = 'RU';
        }
    }
    public function admin()
    {
       return view('admin_pages.home');
    }
    public function reset(Request $request)
   {
       if (!$request->all())
       {
           return view ('admin_pages.password.reset');
       }
       else
       {
           $user = User::find(1); //в таблице одна запись (один админ) с id = 1

           if (Hash::check((Input::get('old')), $user->password))
           {
               if ( Input::get('new') == Input::get('confirm') )
               {
                   $user->password = Hash::make(Input::get('new'));
                   $user->save();
                   return view('admin_pages.reset',['message'=>'Пароль успешно изменен!']);
               }
               else
               {
                   return view('admin_pages.reset',['message'=>'Новые пароли не совпадают!']);
               }
           }
           else
           {
               return view('admin_pages.reset',['message'=>'Старый пароль был не такой!']);
           }
       }
   }
    
    public function read_contacts()
    {
        $contacts = Contacts::all();
        return view('admin_pages.contacts.read_contacts',['contacts'=>$contacts]);
    }
    public function update_contacts()
    {
        DB::table('contacts')
            ->where('id',1)
            ->update([
                'mail_address_ru'     => Input::get('mail_address_ru'),
                'mail_address_en'     => Input::get('mail_address_en'),
                'legal_address_ru'    => Input::get('legal_address_ru'),
                'legal_address_en'    => Input::get('legal_address_en'),
                'additional_info_ru'  => Input::get('additional_info_ru'),
                'additional_info_en'  => Input::get('additional_info_en'),
                'phone1'              => Input::get('phone1'),
                'phone2'              => Input::get('phone2'),
                'phone3'              => Input::get('phone3'),
                'phone4'              => Input::get('phone4'),
                'phone5'              => Input::get('phone5'),
                'phone6'              => Input::get('phone6'),
                'mail1'               => Input::get('mail1'),
                'mail2'               => Input::get('mail2'),
                'requisites_ru'       => Input::get('requisites_ru'),
                'requisites_en'       => Input::get('requisites_en'),
                'taxID_ru'            => Input::get('taxID_ru'),
                'taxID_en'            => Input::get('taxID_en'),
                'orgID_ru'            => Input::get('orgID_ru'),
                'orgID_en'            => Input::get('orgID_en'),
                'country_ru'          => Input::get('country_ru'),
                'country_en'          => Input::get('country_en'),
                'index1'              => Input::get('index1'),
                'index2'              => Input::get('index2'),
            ]);
        return redirect()->action('AdminController@read_contacts');
    }

    public function read_menu()
    {
        $menu = Menu::all();
        return view('admin_pages.menu.read_menu',['menu'=>$menu]);
    }
    public function edit_item_menu()
    {
        $id = Input::get('id');
        $item_menu = DB::table('menus')->select('id','title_ru','title_en')->where('id','=',$id)->first();

        return view('admin_pages.menu.edit_item_menu',['item_menu' => $item_menu]);
    }
    public function update_item_menu()
    {
        DB::table('menus')
            ->where('id',Input::get('id'))
            ->update([
                'title_ru' => Input::get('title_ru'),
                'title_en' => Input::get('title_en'),
            ]);
        return redirect()->action('AdminController@read_menu');
    }

    public function read_slider()
    {
        $slider = Slider::all();
        return view('admin_pages.slider.read_slider',['slider'=>$slider]);
    }
    public function edit_item_slider()
    {
        $item_slider = Slider::find(Input::get('id'));
        return view('admin_pages.slider.edit_item_slider',['item_slider' => $item_slider]);
    }
    public function delete_item_slider()
    {
        $slider = Slider::find(Input::get('id'));
        $img = $slider->img;
        $slider->delete();

        if ($img != null)
        {
            if (! DB::table('sliders')->where('img','like',$img)->first())
            {
                if (file_exists(public_path().$img))
                {
                    unlink(public_path().$img);
                }
            }
        }
        return redirect()->action('AdminController@read_slider');
    }

    public function read_catalog()
    {
        $catalog = DB::table('catalogs')->select('alias','title_ru','title_en')->get();
        return view('admin_pages.catalog.read_catalog',['catalog' =>$catalog]);
    }
    public function edit_catalog($alias)
    {
        if (Input::get('error'))
        {
            $item_catalog = DB::table('catalogs')->where('alias','=',$alias)->first();
            return view('admin_pages.catalog.edit_catalog',['item_catalog' => $item_catalog,'error'=>Input::get('error')]);
        }
        else
        {
            $item_catalog = DB::table('catalogs')->where('alias','=',$alias)->first();
            return view('admin_pages.catalog.edit_catalog',['item_catalog' => $item_catalog]);
        }
    }
    public function edit_material_catalog($alias)
    {
        $item_catalog = DB::table('catalogs')->select('id','title_ru','title_en')->where('alias','=',$alias)->first();
        $material = DB::table('products_and_services')->where('parent','=',$item_catalog->id)->first();
        $images = DB::table('catalog_images')->select('id','img')->where('parent',$item_catalog->id)->get();

        return view('admin_pages.catalog.edit_material_catalog',['material'=>$material,'item_catalog' => $item_catalog,'images'=>$images]);
    }
    public function delete_catalog_images()
    {
        $catalog_img = CatalogImage::find(Input::get('id'));
        $img = $catalog_img->img;
        $catalog_img->delete();

        if ($img != null)
        {
            if (! DB::table('catalog_images')->where('img','like',$img)->first())
            {
                if (file_exists(public_path().$img))
                {
                    unlink(public_path().$img);
                }
            }
        }
        $alias = DB::table('catalogs')->where('id',$catalog_img->parent)->value('alias');
        return redirect()->action('AdminController@edit_material_catalog',['alias'=>$alias]);
    }
    public function delete_catalog($alias)
    {
        $item_catalog = DB::table('catalogs')->where('alias',$alias)->first();

        $images = DB::table('catalog_images')->where('parent',$item_catalog->id)->get();
        foreach($images as $item)
        {
            if ($item->img != null)
            {
                if (! DB::table('catalog_images')->where([['img','like',$item->img],['parent','<>',$item_catalog->id]])->first())
                {
                    if (file_exists(public_path().$item->img))
                    {
                        unlink(public_path().$item->img);
                    }
                }
            }
        }

        if ($item_catalog->img != null)
        {
            if (! DB::table('catalogs')->where([['img','like',$item_catalog->img],['id','<>',$item_catalog->id]])->first())
            {
                if (file_exists(public_path().$item_catalog->img))
                {
                    unlink(public_path().$item_catalog->img);
                }
            }
        }


        DB::table('catalogs')->where('alias','=',$alias)->delete();

        return redirect()->action('AdminController@read_catalog');
    }

    public function read_company()
    {
        $company = DB::table('companies')->first();
        return view('admin_pages.company.read_company',['company'=>$company]);
    }
    public function update_company()
    {
        DB::table('companies')
            ->where('id',Input::get('id'))
            ->update([
                'prev_text_ru' => Input::get('prev_text_ru'),
                'prev_text_en' => Input::get('prev_text_en'),
                'title_ru' => Input::get('title_ru'),
                'title_en' => Input::get('title_en'),
                'desc_ru' => Input::get('desc_ru'),
                'desc_en' => Input::get('desc_en'),
                'video' => Input::get('video'),
            ]);
        return redirect()->action('AdminController@read_company');
    }

    public function read_stock()
    {
        $stock = DB::table('stocks')->first();
        return view('admin_pages.stock.read_stock',['stock'=>$stock]);
    }
    public function update_stock()
    {
        DB::table('stocks')
            ->where('id',Input::get('id'))
            ->update([
                'title_ru' => Input::get('title_ru'),
                'title_en' => Input::get('title_en'),
                'desc_ru' => Input::get('desc_ru'),
                'desc_en' => Input::get('desc_en'),
            ]);
        return redirect()->action('AdminController@read_stock');
    }

    public function read_developments()
    {
        $item_development = DB::table('developments')->first();
        $images = DB::table('developments_images')->get();

        return view('admin_pages.developments.read_developments',['item_development'=>$item_development,'images'=>$images]);
    }
    public function delete_developments_images()
    {
        $image = DevelopmentsImages::find(Input::get('id'));
        $img = $image->img;
        $image->delete();

        if ($img != null)
        {
            if (! DB::table('developments_images')->where('img','like',$img)->first())
            {
                if (file_exists(public_path().$img))
                {
                    unlink(public_path().$img);
                }
            }
        }

        return redirect()->action('AdminController@read_developments');
    }

    public function read_news()
    {
        $news = DB::table('news')->select('id','title_ru','title_en')->get();
        return view('admin_pages.news.read_news',['news'=>$news]);
    }
    public function edit_item_news()
    {
        $item_news = News::find(Input::get('id'));
        if ($item_news->date)
        {
            $date = explode("-",$item_news->date);
            $item_news->date = $date[1].'/'.$date[2].'/'.$date[0];
        }

        return view ('admin_pages.news.edit_item_news',['item_news'=>$item_news]);
    }
    public function delete_item_news ()
    {
        $news = News::find(Input::get('id'));
        $img = $news->img;
        $news->delete();

        if ($img != null)
        {
            if (! DB::table('news')->where('img','like',$img)->first())
            {
                if (file_exists(public_path().$img))
                {
                    unlink(public_path().$img);
                }
            }
        }

        return redirect()->action('AdminController@read_news');
    }
    
    public function read_certificates()
    {
        $data = DB::table('certificate_and_licenses')->get();
        $certificates = array();
        $licenses = array();
        foreach ($data as $document)
        {
            if ($document->doc == 0)
            {
                array_push($certificates,$document);
            }
            else
            {
                array_push($licenses,$document);
            }
        }
        return view('admin_pages.certificates.read_certificates',['certificates'=>$certificates,'licenses'=>$licenses]);
    }
    public function delete_certificates()
    {
        $cert = CertificateAndLicense::find(Input::get('id'));
        $img = $cert->img;
        $cert->delete();

        if ($img != null)
        {
            if (! DB::table('certificate_and_licenses')->where('img','like',$img)->first())
            {
                if (file_exists(public_path().$img))
                {
                    unlink(public_path().$img);
                }
            }
        }

        return redirect()->action('AdminController@read_certificates');
    }

    public function read_document()
    {
        $doc = DB::table('download')->select('id','path_doc')->first();

        $name = explode('/', $doc->path_doc);
        $name = $name[count($name)-1];

        return view('admin_pages.document.read_document',['doc'=>$doc,'name'=>$name]);
    }
}
