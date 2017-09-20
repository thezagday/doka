@extends('main')
@section('content')
    <div class="container-fluid">
        <div class="row breadcrumb">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li>
                        <a href="/">{!! $_SESSION['lang'] == "RU"?'Главная':'Main' !!}</a>
                    </li>
                    <li class="active">{!! $_SESSION['lang'] == "RU"?'Новости':'News' !!}</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="container-fluid content contact-page">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center roboto">{!! $_SESSION['lang'] == "RU"?'НОВОСТИ':'NEWS' !!}</h2>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row news-slider">
                            <div class="col-md-12 news-block">
                                @foreach($news as $item)
                                <div class="news-wrapper">
                                    <small>{!! $item->date !!}</small>
                                    <a href="news_page?id={!! $item->id !!}">{!! $_SESSION['lang'] == "RU"?$item->title_ru:$item->title_en !!}</a>
                                    <p>{!! $_SESSION['lang'] == "RU"?$item->prev_text2_ru:$item->prev_text2_en !!}</p>
                                </div>
                               @endforeach
                                <ul class="pagination">
                                    {!! $news->render() !!}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop