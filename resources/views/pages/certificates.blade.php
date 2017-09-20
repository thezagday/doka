@extends('main')
@section('content')
    <div class="container-fluid">
        <div class="row breadcrumb">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li>
                        <a href="/">{!! $_SESSION['lang'] == "RU"?'Главная':'Main' !!}</a>
                    </li>
                    <li class="active">{!! $_SESSION['lang'] == "RU"?'Сертификаты и лицензии':'Certificates and licenses' !!}</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="container-fluid content ">
        <div class="row contact-page">
            <div class="col-md-12">
                <h2 class="text-center roboto">{!! $_SESSION['lang'] == "RU"?'СЕРТИФИКАТЫ':'CERTIFICATES' !!}</h2>
                <br>
                <div class="row sert-wrapper baguetteBox">
                    @foreach($certificates as $certificate)
                    <div class="col-xs-6 col-md-3">
                        <a href="{!! $certificate->img !!}" class="sert-item" style="background-image: url('{!! $certificate->img !!}');"></a>
                    </div>
                    @endforeach
                </div>
                <h2 class="text-center roboto">{!! $_SESSION['lang'] == "RU"?'ЛИЦЕНЗИИ':'LICENSIES' !!}</h2>
                <br>
                <div class="row sert-wrapper baguetteBox">
                    @foreach($licenses as $license)
                    <div class="col-xs-6 col-md-3">
                        <a href="{!! $license->img !!}" class="sert-item" style="background-image: url('{!! $license->img !!}');"></a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@stop