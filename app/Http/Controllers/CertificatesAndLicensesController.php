<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CertificatesAndLicensesController extends Controller
{
    public function __construct()
    {
        session_start();
    }
    public function certificates()
    {
        $data = DB::table('certificate_and_licenses')->get();
        $certificates = array();
        $licenses = array();
        foreach ($data as $document)
        {
            if ($document->doc == 0) //0 - сертификат, 1 - лицензия
            {
                array_push($certificates,$document);
            }
            else
            {
                array_push($licenses,$document);
            }
        }
        return view ('pages.certificates',['certificates'=>$certificates,'licenses'=>$licenses]);
    }
}
