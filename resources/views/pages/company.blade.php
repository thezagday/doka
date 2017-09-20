@extends('main')
@section('content')
    <div class="container-fluid">
        <div class="row breadcrumb">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li>
                        <a href="/">{!! $_SESSION['lang'] == "RU"? 'Главная':'Main'!!}</a>
                    </li>
                    <li class="active">{!! $_SESSION['lang'] == "RU"? 'О Компании':'About company'!!}</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="container-fluid content ">
        <br>
        <br>
        <div class="row">
            <!--<div class="col-md-12">
                <div class="img-wrapper">
                    <img src="images/company.jpg" alt="company">
                </div>
            </div>-->
        </div>
        <div class="row contact-page">
            <div class="col-md-12">
                <h2 class="roboto">{!! $_SESSION['lang'] == "RU"?$company->title_ru:$company->title_en !!}</h2>
                <br>
                <p>
                    {!! $_SESSION['lang'] == "RU"?$company->desc_ru:$company->desc_en !!}
                </p>
                <br>
                <iframe style="width: 800px;max-width: 100%;height: 500px;margin:auto;display: block;" src="{!! $company->video !!}" frameborder="0" allowfullscreen></iframe>
                <br>
                <h2 class="text-center roboto">{!! $_SESSION['lang'] == "RU"?'НОВОСТИ':'NEWS' !!}</h2>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row news-slider">
                            <div class="col-sm-6 hidden-xs">
                                @for($i = 0;$i<count($news);$i++)
                                    @if($i==0)
                                    <div class="new-block-wrapper active">
                                        <h4><a href="news_page">{!! $_SESSION['lang'] == "RU"?$news[$i]->title_ru:$news[$i]->title_en !!}</a></h4>
                                        <div class="new-img-wrapper">
                                            <img src="{!! $news[$i]->img !!}" alt="company">
                                        </div>
                                        <p>{!! $_SESSION['lang'] == "RU"?$news[$i]->prev_text2_ru:$news[$i]->prev_text2_en !!}</p>
                                    </div>
                                    @else
                                    <div class="new-block-wrapper">
                                        <h4><a href="news_page">{!! $_SESSION['lang'] == "RU"?$news[$i]->title_ru:$news[$i]->title_en !!}</a></h4>
                                        <div class="new-img-wrapper">
                                            <img src="{!! $news[$i]->img !!}" alt="company">
                                        </div>
                                        <p>{!! $_SESSION['lang'] == "RU"?$news[$i]->prev_text2_ru:$news[$i]->prev_text2_en !!}</p>
                                    </div>
                                    @endif
                                @endfor
                            </div>
                            <div class="col-sm-6 news-block">
                                @foreach($news as $item)
                                <div class="news-wrapper active">
                                    <small>{!! $item->date !!}</small>
                                    <a href="news-page.php">{!! $_SESSION['lang'] == "RU"?$item->title_ru:$item->title_en !!}</a>
                                    <p>{!! $_SESSION['lang'] == "RU"?$item->prev_text1_ru:$item->prev_text1_en !!}</p>
                                </div>
                                @endforeach
                                <a href="news" class="more-link">{!! $_SESSION['lang'] == "RU"?'Все новости':'All news' !!} <span class="fa fa-angle-double-right"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <h2 class="text-center roboto">{!! $_SESSION['lang'] == "RU"?'СЕРТИФИКАТЫ':'CERTIFICATES' !!}</h2>
                <br>
                <div class="row sert-wrapper baguetteBox">
                    @foreach($certificates as $certificate)
                    <div class="col-xs-6 col-md-3">
                        <a href="{!! $certificate->img !!}" class="sert-item" style="background-image: url('{!! $certificate->img !!}');"></a>
                    </div>
                    @endforeach
                </div>
                <br>
            </div>
        </div>
    </div>
@stop