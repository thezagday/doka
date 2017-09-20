<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{!! asset('images/favicon.ico') !!}" type="image/x-icon">
    <title>ДОКА</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.2/baguetteBox.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <div class="header-info row">
            <div class="col-md-12">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">
                        <img src="images/logo.png" alt="logo">
                    </a>
                </div>
                <ul class="nav navbar-nav navbar-center hidden-xs">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="icon-square">
							<img src="images/icons/placeholder.png" alt="icon"></span>{!! $_SESSION['lang']== "RU"? $contact[0]->mail_address_ru:$contact[0]->mail_address_en !!} <b class="fa fa-angle-down"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <p>{!! $_SESSION['lang']== "RU"? $contact[0]->additional_info_ru:$contact[0]->additional_info_en !!}</p>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="icon-square">
							<img src="images/icons/phone-call.png" alt="icon"></span> {!! $contact[0]->phone1 !!} <b class="fa fa-angle-down"></b></a>
                        <ul class="dropdown-menu">
                            <li>{!! $contact[0]->phone2 !!}</li>
                            <li>{!! $contact[0]->phone3 !!}</li>
                            <li>{!! $contact[0]->phone4 !!}</li>
                            <li>{!! $contact[0]->phone5 !!}</li>
                            <li>{!! $contact[0]->phone6 !!}</li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right hidden-xs">
                    <li><a href="lang" class="lang">{{ $_SESSION['lang']=='RU'?'ENG':'RU'}}</a></li>
                </ul>
            </div>
        </div>

        <div class="header-menu row">
            <div class="col-md-12">
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
                        @foreach($menu as $item)
                            @if($item->catalog)
                                <li class="dropdown hidden-xs">
                                    <a href="none" class="text-uppercase dropdown-toggle" data-toggle="dropdown">{!! $_SESSION['lang']== "RU"? $item->title_ru:$item->title_en !!}<b class="fa fa-angle-down"></b></a>
                                    <ul class="dropdown-menu">
                                        @foreach($catalog as $cat)
                                            <li><a href="{!! $cat->alias !!}">{!! $_SESSION['lang'] == "RU"? strip_tags($cat->title_ru):strip_tags($cat->title_en) !!}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            @else
                                @if ($item->link == $active)
                                    <li class="active"><a href="{!! $item->link !!}" class="text-uppercase">{!! $_SESSION['lang']== "RU"? $item->title_ru:$item->title_en !!}</a></li>
                                @else
                                    <li ><a href="{!! $item->link !!}" class="text-uppercase">{!! $_SESSION['lang']== "RU"? $item->title_ru:$item->title_en !!}</a></li>
                                @endif
                            @endif
                        @endforeach
                    </ul>
                    <div class="nav navbar-nav navbar-right">
                        <form action="search" class="navbar-form navbar-left" role="search">
                            <div class="form-group">
                                <input type="text" name="line" class="form-control" required="required" placeholder="{!! $_SESSION['lang']== "RU"? 'Поиск':'Search' !!}">
                            </div>
                            <button type="submit" class="btn btn-default"><img src="images/icons/search.png" alt="icon"></button>
                        </form>
                    </div>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>
        </div>

    </div>
</nav>

@yield('content', 'Default Content')

<div class="container-fluid">
    <div class="row callback-block">
        <div class="col-md-12">
            <h3 class="text-uppercase roboto">{{ $_SESSION['lang']=='RU'?'Оставьте заявку':'Leave an application'}}</h3>
            <p>{{ $_SESSION['lang']=='RU'?'Наш специалист сам перезвонит Вам в ближайшее время':'Our specialist will call you back in the near future'}}</p>
            <form action="mail" method="POST" role="form" class="input-block">
                {{csrf_field()}}
                <div class="form-group">
                    <input type="text" value="" required class="form-control" name="name" onkeyup="this.setAttribute('value', this.value);">
                    <label class="font-light" for="name">{{ $_SESSION['lang']=='RU'?'Ваше имя':'Name'}}</label>
                </div>
                <div class="form-group">
                    <input type="text" value="" required class="form-control phone-mask" pattern="\W\d{3} \W\d{2}\W \d{3}-\d{2}-\d{2}" name="phone" onkeyup="this.setAttribute('value', this.value);">
                    <label class="font-light" for="phone">{{ $_SESSION['lang']=='RU'?'Номер телефона':'Phone'}}</label>
                </div>
                <input type="hidden" name="url" value="">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary font-bold" id="submit">{{ $_SESSION['lang']=='RU'?'ОТПРАВИТЬ':'SUBMIT'}}</button>
                </div>
            </form>
            <?php
            if(isset($_SESSION['sended']) && ($_SESSION['sended'])) : ?>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/sweetalert2/6.6.2/sweetalert2.min.css">
            <script src="https://cdn.jsdelivr.net/sweetalert2/6.6.2/sweetalert2.min.js"></script>
            <script>
                swal({
                    title: 'Успешно отправлено!',
                    timer: 3000,
                    type: 'success',
                    showCancelButton: false,
                    showConfirmButton: false
                });
            </script>
            <?php $_SESSION['sended'] = null; endif; ?>
        </div>
    </div>
</div>
<div class="footer container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-sm-3 footer-logo">
                    <div class="row">
                        <a href="/" class="navbar-brand">
                            <img src="images/logo.png" alt="logo">
                        </a>
                    </div>
                </div>
                <div class="col-sm-3 footer-nav">
                    <h4>{{ $_SESSION['lang']=='RU'?'ДЕЯТЕЛЬНОСТЬ':'ACTIVITIES'}}</h4>
                    <ul>
                        <li><a href="catalog">{{ $_SESSION['lang']=='RU'?'Продукция и услуги':'Products and services'}}</a></li>
                        <li><a href="products_in_stock">{{ $_SESSION['lang']=='RU'?'Продукция на складе':'Products in stock'}}</a></li>
                        <li><a href="development">{{ $_SESSION['lang']=='RU'?'Разработки':'Development'}}</a></li>
                        <li><br></li>
                        <li><a href="{!! $doc->path_doc !!}" download class="btn btn-primary font-bold">{{ $_SESSION['lang']=='RU'?'Скачать каталог':'Download catalog'}}</a></li>
                    </ul>
                </div>
                <div class="col-sm-3 footer-nav">
                    <h4>{{ $_SESSION['lang']=='RU'?'КОМПАНИЯ':'COMPANY'}}</h4>
                    <ul>
                        <li><a href="company">{{ $_SESSION['lang']=='RU'?'О Компании':'About company'}}</a></li>
                        <li><a href="certificates">{{ $_SESSION['lang']=='RU'?'Сертификаты и лицензии':'Certificates and licenses'}}</a></li>
                        <li><a href="files/doka.pdf" download><span class="fa fa-floppy-o" style="margin-right: 5px;"></span>{{ $_SESSION['lang']=='RU'?'Скачать каталог':'Download catalog'}}</a></li>
                        <li><br></li>
                        <li><a href="sitemap" style="text-decoration: underline;">{{ $_SESSION['lang']=='RU'?'Карта сайта':'Map'}}</a></li>
                    </ul>
                </div>
                <div class="col-sm-3 footer-nav">
                    <h4>{!! $_SESSION['lang']== "RU"? 'КОНТАКТЫ':'CONTACTS' !!}</h4>
                    <ul>
                        <li><span class="fa fa-map-marker" style="margin-right: 5px;"></span>{!! $_SESSION['lang']== "RU"? $contact[0]->country_ru:$contact[0]->country_en !!} <br>
                            {!! $contact[0]->index1 !!}, {!! $_SESSION['lang']== "RU"? $contact[0]->mail_address_ru:$contact[0]->mail_address_en !!}</li>
                        <li><a href="tel:+375 (33) 307-30-74"><span class="fa fa-phone" style="margin-right: 5px;"></span>{!! $contact[0]->phone4 !!}</a></li>
                        <li><a href="mailto:satop@tut.by"><span class="fa fa-envelope-o" style="margin-right: 5px;"></span>{{ $contact[0]->mail1 }}</a></li>
                        <li><a href="contacts" style="text-decoration: underline;">{!! $_SESSION['lang']== "RU"?'Все контакты':'All contacts'!!}</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-12 footer-bottom">
            <div class="float-left">
                <p>© 1995-<?php echo date('Y'); ?>  {{ $_SESSION['lang']=='RU'?'ООО «ДОКА»':'LTD «DOKA»'}}</p>
            </div>
            <div class="float-right">
                <p><a href="http://scroll.by/" target="_blank">{{ $_SESSION['lang']=='RU'?'Разработка сайтов:':'Website development:'}} </a> <img src="images/logo-scroll.png" alt="scroll.by"></p>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.2/baguetteBox.min.js"></script>
<script src="{{asset('js/script.js')}}"></script>
<script type="text/javascript" src="{{asset('js/yandex_api.min.js')}}"></script>
<script>
    ymaps.ready(function () {
        var myMap = new ymaps.Map('map', {
                    center: [53.1228,26.0431],
                    zoom: 16,
                    controls: ['zoomControl', 'typeSelector',  'fullscreenControl', 'geolocationControl', 'rulerControl']
                }, {
                    searchControlProvider: 'yandex#search'
                }),

                myPlacemark = new ymaps.Placemark([53.1228,26.0431], {
                    hintContent: '{!! $_SESSION['lang'] == "RU"?$contact[0]->mail_address_ru:$contact[0]->mail_address_en !!}',
                    balloonContent: '{!! $_SESSION['lang'] == "RU"? 'ООО «ДОКА»<br>'.$contact[0]->mail_address_ru:'LTD «DOKA»<br>'.$contact[0]->mail_address_en !!}'
                })
        myMap.geoObjects
                .add(myPlacemark);
    });
</script>

</body>
</html>