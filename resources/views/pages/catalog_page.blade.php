@extends('main')
@section('content')
    <div class="container-fluid">
        <div class="row breadcrumb">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li>
                        <a href="/">{!! $_SESSION['lang'] == "RU"? 'Главная':'Home' !!}</a>
                    </li>
                    <li>
                        <a href="catalog">{!! $_SESSION['lang'] == "RU"? 'Продукция и услуги':'Products and services' !!}</a>
                    </li>
                    <li class="active">{!! strip_tags($title) !!} </li>
                </ol>
            </div>
        </div>
    </div>

    <div class="container-fluid content">
        <br>
        <div class="row contact-page">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-sm-4 col-md-3 hidden-xs">
                        <div class="catalog-menu-wrapper">
                            <ul class="catalog-menu">
                                @foreach($catalog as $cat)
                                    @if (($product != null) && ($cat->id == $product->parent))
                                        <li class="active" ><a href="{!! $cat->alias !!}" id="id">{!! $_SESSION['lang'] == "RU"? $cat->title_ru:$cat->title_en !!}</a></li>
                                    @else
                                        <li><a href="{!! $cat->alias !!}" id="id">{!! $_SESSION['lang'] == "RU"? $cat->title_ru:$cat->title_en !!}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                            <br>
                            <a href="{!! $doc->path_doc !!}" download class="btn btn-primary font-bold text-uppercase">{!! $_SESSION['lang'] == "RU"? 'Скачать каталог':'Download catalog' !!}</a>
                            <br>
                            <br>
                            <ul class="news-list-wrapper">
                                @foreach($news as $item)
                                <li class="news-wrapper">
                                    <small>{!! $item->date !!}</small>
                                    <a href="news_page?id={!! $item->id !!}">{!! $_SESSION['lang'] == "RU"? $item->title_ru:$item->title_en !!}</a>
                                    <p>{!! $_SESSION['lang'] == "RU"? $item->prev_text1_ru:$item->prev_text1_en !!}</p>
                                </li>
                               @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-8 col-md-9">
                        <h2 class="roboto">{!! strip_tags($title) !!}</h2>
                        <br>
                        <!--<div class="img-wrapper">
                            <img src="images/company.jpg" alt="image">
                        </div>-->
                        <p>
                            @if($product!=null)
                                {!! $_SESSION['lang'] == "RU"? $product->description_ru:$product->description_en !!}
                            @else
                            {!! $_SESSION['lang'] == "RU"? "<h1>В базе данных нет материала для этого пункта меню!</h1>":"<h1>There is no material for this menu item in the database!</h1>" !!}
                            @endif
                        </p>
                        <br>
                        <div class="product-slider-wrapper catalog-slider">
                            <div class="product-page-carousel baguetteBox">
                                @foreach($images as $item)
                                <div>
                                    <a href="{!! $item->img !!}" style="background-image: url('{!! $item->img !!}');"></a>
                                </div>
                                @endforeach
                            </div>
                            <div class="product-page-carousel-thumb">
                                @foreach($images as $item)
                                <div style="background-image: url('{!! $item->img !!}')"></div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
    </div>
@stop