@extends('main')
@section('content')
    <div class="container-fluid">
        <div class="row breadcrumb">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li>
                        <a href="/">{!! $_SESSION['lang'] == "RU"?'Главная':'Main' !!}</a>
                    </li>
                    <li class="active">{!! $_SESSION['lang'] == "RU"?'Продукция на складе':'Products in stock' !!}</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="container-fluid content ">
        <br>
        <div class="row contact-page">
            <div class="col-md-12">
                <h2 class="roboto">{!! $_SESSION['lang'] == "RU"?$stock->title_ru:$stock->title_en !!}</h2>
                <br>
                <p>{!! $_SESSION['lang'] == "RU"?$stock->desc_ru:$stock->desc_en !!}</p>
            </div>
        </div>
        <br>
        <br>
    </div>
@stop