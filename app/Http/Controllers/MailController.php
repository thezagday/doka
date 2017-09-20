<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Contacts;
use Illuminate\Support\Facades\Redirect;

class MailController extends Controller
{
    public function __construct()
    {
        session_start();
    }

    public function mail()
    {
        $subject = "Новая заявка";
        $name = Input::get('name');
        $phone = Input::get('phone');
        $url = Input::get('url');

        $mailsend = mail(Contacts::find(1)->mail1, $subject, "Имя: $name\nТелефон: $phone");

        if($mailsend)
        {
            $_SESSION['sended'] = true;
            return Redirect::away($url);
            exit;
        }

    }
}
