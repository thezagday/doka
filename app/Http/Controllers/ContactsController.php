<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ContactsController extends Controller
{
    public function __construct()
    {
        session_start();
    }
    public function contacts()
    {
        if ($_SESSION['lang'] == "RU")
        {
            $contacts = DB::table('contacts')
                ->select('mail_address_ru','index1','legal_address_ru','index2','mail1','mail2','phone1','phone2','phone3','phone4','phone5','phone6','requisites_ru','taxID_ru','orgID_ru')
                ->get();
        }
        else
        {
            $contacts = DB::table('contacts')
                ->select('mail_address_en','index1','legal_address_en','index2','mail1','mail2','phone1','phone2','phone3','phone4','phone5','phone6','requisites_en','taxID_en','orgID_en')
                ->get();
        }
        return view('pages.contacts',['contacts'=>$contacts]);
    }
}
