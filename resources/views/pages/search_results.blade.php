@extends('main')
@section('content')
    <div class="container-fluid">
        <div class="row breadcrumb">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li>
                        <a href="/">{!! $_SESSION['lang'] =="RU"?'Главная':'Main' !!}</a>
                    </li>
                    <li class="active">{!! $_SESSION['lang'] =="RU"?'Результаты поиска':'Search results' !!}</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="container-fluid content contact-page">
        <div class="row">
            <div class="col-md-12">
                <h2 class="roboto">{!! $_SESSION['lang'] =="RU"?"Результаты поиска по запросу \"$line:\"":"Search results for \"$line:\"" !!}</h2>
                <p>{!! $_SESSION['lang'] =="RU"?"Найдено совпадений:".count($results):"Total matches found:".count($results) !!}</p>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row news-slider">
                            <div class="col-md-12 news-block">
                                @foreach($results as $item)
                                <div class="search-wrapper">
                                    <a href="news_page?id={!! $item->id !!}">{!! $_SESSION['lang'] =="RU"?$item->title_ru:$item->title_en !!}</a>
                                    <p>{!! $_SESSION['lang'] =="RU"?$item->prev_text1_ru:$item->prev_text1_en !!}</p>
                                </div>
                                @endforeach
                                <ul class="pagination">
                                    {!! $results->render() !!}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop