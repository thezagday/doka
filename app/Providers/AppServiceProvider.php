<?php

namespace App\Providers;

use App\Catalog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(255);
        $this->ComposeContacts();
        $this->ComposeMenu();
        $this->ComposeCatalog();
        $this->ComposeAdminCatalog();
        $this->ComposeDownload();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    private function ComposeContacts()
    {
        view()->composer('main', function($view)
        {
            if ($_SESSION['lang'] == "RU")
            {
                $contacts = DB::table('contacts')->select('mail_address_ru','additional_info_ru','phone1','phone2','phone3','phone4','phone5','phone6','country_ru','index1','mail1')->get();
            }
            else
            {
                $contacts = DB::table('contacts')->select('mail_address_en','additional_info_en','phone1','phone2','phone3','phone4','phone5','phone6','country_en','index1','mail1')->get();
            }

            $view->with('contact', $contacts);
        });
    }
    private function ComposeMenu()
    {
        view()->composer('main',function($view)
        {
            if ($_SESSION['lang'] == "RU")
            {
                $menu = DB::table('menus')->select('title_ru','link','catalog')->get();
            }
            else
            {
                $menu = DB::table('menus')->select('title_en','link','catalog')->get();
            }
            
            $view->with(['menu'=>$menu,'active' => getUrl()]);
        });
    }
    private function ComposeCatalog()
    {
        view()->composer('main',function($view)
        {
             if ($_SESSION['lang'] == "RU")
             {
                 $catalog = DB::table('catalogs')->select('alias','title_ru')->get();
             }
             else
             {
                 $catalog = DB::table('catalogs')->select('alias','title_en')->get();
             }
            $view->with('catalog',$catalog);
        });
    }

    private function ComposeAdminCatalog()
    {
        view()->composer('admin_main',function($view)
        {
            $catalog = DB::table('catalogs')->select('alias','title_ru','title_en')->get();

            $view->with(['catalog'=>$catalog]);
        });
    }

    private function ComposeDownload()
    {
        view()->composer('main',function($view)
        {
            $doc = DB::table('download')->select('path_doc')->first();

            $view->with('doc',$doc);
        });
    }
}
