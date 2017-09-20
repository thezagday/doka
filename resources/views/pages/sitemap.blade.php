@extends('main')
@section('content')
    <div class="container-fluid">
        <div class="row breadcrumb">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li>
                        <a href="/">{!! $_SESSION['lang'] == "RU"?'Главная':'Main' !!}</a>
                    </li>
                    <li class="active">{!! $_SESSION['lang'] == "RU"?'Карта сайта':'Map' !!}</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="container-fluid content ">
        <div class="row contact-page">
            <div class="col-md-12">
                <ul class="site-map">
                    @foreach($menu as $item)
                        @if ($item->catalog == 1)
                            <li>
                                <a href="catalog.php">{!! $_SESSION['lang'] == "RU"?$item->title_ru:$item->title_en !!}</a>
                                <ul>
                                    @foreach($catalog as $cat)
                                        <li><a href="{!! $cat->alias !!}">{!! $_SESSION['lang'] == "RU"?strip_tags($cat->title_ru):strip_tags($cat->title_en) !!}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            <li><a href="{!! $item->link !!}">{!! $_SESSION['lang'] == "RU"?$item->title_ru:$item->title_en !!}</a></li>
                        @endif
                    @endforeach
                    <li>
                        <a href="certificates">{!! $_SESSION['lang'] == "RU"?'Сертификаты и лицензии':'Certificates and licenses' !!}</a>
                    </li>
                    <li>
                        <a href="news">{!! $_SESSION['lang'] == "RU"?'Новости':'News' !!}</a>
                        <ul>
                            @foreach($news as $item)
                            <li><a href="news_page?id={!! $item->id !!}">{!! $_SESSION['lang'] == "RU"?$item->title_ru:$item->title_en !!}</a></li>
                           @endforeach
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@stop