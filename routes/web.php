<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Front*/
Route::get('/', ['uses'=>'HomeController@home']);
Route::get('/company',['uses'=>'CompanyController@company']);
Route::get('/lang',['uses'=>'LangController@lang']);
Route::get('/contacts',['uses'=>'ContactsController@contacts']);
Route::get('/catalog',['uses'=>'CatalogController@catalog']);
Route::get('/news',['uses'=>'NewsController@news']);
Route::get('/products_in_stock',['uses'=>'StockController@stock']);
Route::get('/development',['uses'=>'DevelopmentController@development']);
Route::get('/certificates',['uses'=>'CertificatesAndLicensesController@certificates']);
Route::get('/sitemap',['uses'=>'SitemapController@sitemap']);
Route::post('/mail',['uses'=>'MailController@mail']);

/*Admin*/
Route::any('/login',['uses'=>'AuthController@login']);
Route::any('/logout',['uses'=>'AuthController@logout']);

Route::group(['middleware' => 'is-admin'], function () {

    Route::get('/admin', ['uses' => 'AdminController@admin']);

    Route::get('/read_contacts', ['uses' => 'AdminController@read_contacts']);
    Route::post('/update_contacts', ['uses' => 'AdminController@update_contacts']);

    Route::get('/read_menu', ['uses' => 'AdminController@read_menu']);
    Route::get('/edit_item_menu', ['uses' => 'AdminController@edit_item_menu']);
    Route::post('/update_item_menu', ['uses' => 'AdminController@update_item_menu']);

    Route::get('/read_slider', ['uses' => 'AdminController@read_slider']);
    Route::get('/edit_item_slider', ['uses' => 'AdminController@edit_item_slider']);
    Route::post('/update_item_slider', ['uses' => 'UploadController@update_item_slider']);
    Route::any('/add_slider', ['uses' => 'UploadController@add_slider']);
    Route::get('/delete_item_slider', ['uses' => 'AdminController@delete_item_slider']);

    Route::get('/edit_catalog/{alias?}', ['uses' => 'AdminController@edit_catalog']);
    Route::post('/update_catalog', ['uses' => 'UploadController@update_catalog']);
    Route::get('/read_catalog', ['uses' => 'AdminController@read_catalog']);
    Route::get('/edit_material_catalog/{alias?}', ['uses' => 'AdminController@edit_material_catalog']);
    Route::post('/update_material_catalog', ['uses' => 'UploadController@update_material_catalog']);
    Route::get('/delete_catalog_images', ['uses' => 'AdminController@delete_catalog_images']);
    Route::any('/add_catalog', ['uses' => 'UploadController@add_catalog']);
    Route::get('/delete_catalog/{alias?}', ['uses' => 'AdminController@delete_catalog']);

    Route::get('/read_company', ['uses' => 'AdminController@read_company']);
    Route::post('/update_company', ['uses' => 'AdminController@update_company']);

    Route::get('/read_stock', ['uses' => 'AdminController@read_stock']);
    Route::post('/update_stock', ['uses' => 'AdminController@update_stock']);

    Route::get('/read_developments', ['uses' => 'AdminController@read_developments']);
    Route::post('/update_developments', ['uses' => 'UploadController@update_developments']);
    Route::get('/delete_developments_images', ['uses' => 'AdminController@delete_developments_images']);

    Route::get('/read_news', ['uses' => 'AdminController@read_news']);
    Route::get('/edit_item_news', ['uses' => 'AdminController@edit_item_news']);
    Route::post('/update_item_news', ['uses' => 'UploadController@update_item_news']);
    Route::get('/delete_item_news', ['uses' => 'AdminController@delete_item_news']);
    Route::any('/add_news', ['uses' => 'UploadController@add_news']);

    Route::get('/read_certificates', ['uses' => 'AdminController@read_certificates']);
    Route::post('/add_certificates', ['uses' => 'UploadController@add_certificates']);
    Route::get('/delete_certificates', ['uses' => 'AdminController@delete_certificates']);

    Route::get('/read_document',['uses'=>'AdminController@read_document']);
    Route::post('/add_document',['uses'=>'UploadController@add_document']);

    Route::any('/reset', ['uses' => 'AdminController@reset']);


});


Route::post('/upload-image', ['uses' => 'CkeditorController@ckeditor_upload']);


/*Get,должны идти после всех прочих роутов*/
Route::get('/search/{line?}',['uses'=>'SearchController@search']);
Route::get('/news_page/{id?}',['uses'=>'NewsController@news_page']);
Route::get('/{alias?}',['uses'=>'CatalogPageController@catalog_page']);







