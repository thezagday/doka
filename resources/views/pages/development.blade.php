@extends('main')
@section('content')
    <div class="container-fluid">
        <div class="row breadcrumb">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li>
                        <a href="/">{!! $_SESSION['lang'] == "RU"? 'Главная':'Main' !!}</a>
                    </li>
                    <li class="active">{!! $_SESSION['lang'] == "RU"? 'Разработки':'Development' !!}</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="container-fluid content contact-page">
        <div class="row">
            <div class="col-md-12">
                <div class="product-slider-wrapper">
                    <div class="product-page-carousel baguetteBox">
                        @foreach($images as $image)
                        <div>
                            <a href="{!! $image->img !!}" style="background-image: url('{!! $image->img !!}');"></a>
                        </div>
                       @endforeach
                    </div>
                    <div class="product-page-carousel-thumb">
                        @foreach($images as $image)
                            <div style="background-image: url('{!! $image->img !!}')"></div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2 class="roboto">{!! $_SESSION['lang'] == "RU"?$developments->title_ru:$developments->title_en !!}</h2>
                <br>
                <p>{!! $_SESSION['lang'] == "RU"?$developments->desc_ru:$developments->desc_en !!}</p>
                <br>
            </div>
        </div>
    </div>
@stop