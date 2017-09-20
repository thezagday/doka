@extends('main')
@section('content')
<div class="container-fluid content">
    <div class="row">
        <div class="owl-carousel main-slider">
            @foreach($sliders as $slide)
            <div>
                <div style="background-image: url('{!! $slide->img !!}')">
                    <div class="item-content row">
                        <div class="col-md-12">
                            <h2>{!!  $_SESSION['lang'] == "RU" ? $slide->title_ru:$slide->title_en !!}</h2>
                            <ul>
                                {!!  $_SESSION['lang'] == "RU" ? $slide->desc_ru:$slide->desc_en !!}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
           @endforeach
        </div>
    </div>
    <div class="row catalog">
        <div class="col-md-12">
            <div class="title">
                <h2 class="roboto">{!! $_SESSION['lang'] == "RU" ? "Продукция и услуги":"Products and services" !!}</h2>
            </div>
            <div class="row">
                @for($i = 0; $i < count($catalog); $i++)
                    @if($i == 0)
                    <div class="col-sm-12">
                        <a href="{!! $catalog[$i]->alias !!}" class="catalog-wrapper">
                            <img src="{!! $catalog[$i]->img !!}" alt="image">
                            <div class="catalog-block">
                                <h2>{!! $_SESSION['lang'] == "RU" ? $catalog[$i]->title_ru:$catalog[$i]->title_en !!}</h2>
                                <ul>
                                    {!! $_SESSION['lang'] == "RU" ? $catalog[$i]->desc_ru:$catalog[$i]->desc_en !!}
                                </ul>
                            </div>
                        </a>
                    </div>
                    @else
                    <div class="col-sm-6">
                        <a href="{!! $catalog[$i]->alias !!}" class="catalog-wrapper">
                            <img src="{!! $catalog[$i]->img !!}" alt="image">
                            <div class="catalog-block">
                                <h2>{!! $_SESSION['lang'] == "RU" ? $catalog[$i]->title_ru:$catalog[$i]->title_en !!}</h2>
                            </div>
                        </a>
                    </div>
                    @endif
                @endfor
            </div>
            <a href="catalog" class="more-button text-uppercase">{!! $_SESSION['lang'] == "RU" ? 'В каталог':'Catalog' !!}</a>
        </div>
    </div>
    <div class="row about">
        <div class="col-md-12">
            <div class="row">
                <div class="col-sm-6 about-block">
                    <h3 class="text-uppercase roboto">{!! $_SESSION['lang'] == "RU" ? 'О Компании':'About company' !!}</h3>
                    <div class="about-video" style="position:relative;height:0;padding-bottom:56.25%"><iframe src="{!! $company->video !!}" width="640" height="360" frameborder="0" style="position:absolute;width:100%;height:100%;left:0" allowfullscreen></iframe></div>
                    <p>{!! $_SESSION['lang'] == "RU"?$company->prev_text_ru:$company->prev_text_en !!}</p>
                    <br>
                    <div class="row">
                        <div class="col-sm-4">
                            <a href="company" class="more-link">{!! $_SESSION['lang'] == "RU"?'Подробнее':'More' !!} <span class="fa fa-angle-double-right"></span></a>
                        </div>
                        <div class="col-sm-8">
                            <a href="certificates" class="more-link">{!! $_SESSION['lang'] == "RU"?'Сертификаты и лицензии':'Certificates and licenses' !!} <span class="fa fa-angle-double-right"></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 news-block">
                    <h3 class="text-uppercase roboto">{!! $_SESSION['lang'] == "RU" ? 'Новости':'News' !!}</h3>
                    @foreach($news as $item)
                    <div class="news-wrapper">
                        <small>{!! $item->date !!}</small>
                        <a href="news_page?id={!! $item->id !!}">{!! $_SESSION['lang'] == "RU"? $item->title_ru:$item->title_en !!}</a>
                        <p>{!! $_SESSION['lang'] == "RU"? $item->prev_text1_ru:$item->prev_text1_en !!}</p>
                    </div>
                    @endforeach
                    <a href="news" class="more-link">{!! $_SESSION['lang'] == "RU" ? 'Все новости':'All news' !!} <span class="fa fa-angle-double-right"></span></a>
                </div>
            </div>
        </div>
    </div>
</div>
@stop