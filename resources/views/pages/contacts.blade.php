@extends('main')
@section('content')

<div class="container-fluid">
    <div class="row breadcrumb">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li>
                    <a href="/">{!! $_SESSION['lang'] == "RU"? 'Главная':'Home'!!}</a>
                </li>
                <li class="active">{!! $_SESSION['lang'] == "RU"? 'Контакты':'Contacts'!!}</li>
            </ol>
        </div>
    </div>
</div>

<div class="container-fluid content contact-page">
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-sm-6">
                    <h2 class="roboto">{!! $_SESSION['lang'] == "RU"? 'Контакты':'Contacts'!!}</h2>
                    <br>
                    <p><b>{!! $_SESSION['lang'] == "RU"?'Почтовый адрес:':'Mail address' !!}</b><br>
                        {!! $contacts[0]->index1 !!},{!! $_SESSION['lang'] == "RU"? $contacts[0]->mail_address_ru:$contacts[0]->mail_address_en !!}</p>
                    <br>
                    <p><b>{!! $_SESSION['lang'] == "RU"?'Юридический адрес:':'Legal address' !!}</b><br>
                        {!! $contacts[0]->index2 !!}, {!! $_SESSION['lang'] == "RU"? $contacts[0]->legal_address_ru:$contacts[0]->legal_address_en !!}</p>
                    <br>
                    <p><b>E-mail: </b>{!! $contacts[0]->mail1 !!}, {!! $contacts[0]->mail2 !!}</p>
                    <p><b>{!! $_SESSION['lang'] == "RU"? 'Телефоны:':'Phones:'!!} </b>{!! $contacts[0]->phone2 !!}<br>
                        <span style="margin-left:92px;"></span>{!! $contacts[0]->phone3 !!}<br>
                        <span style="margin-left:92px;"></span>{!! $contacts[0]->phone4 !!}<br>
                        <span style="margin-left:92px;"></span>{!! $contacts[0]->phone5 !!}<br>
                        <span style="margin-left:92px;"></span>{!! $contacts[0]->phone6 !!}<br>
                    </p>
                    <br>
                    <p><b>{!! $_SESSION['lang'] == "RU"? 'Реквизиты:':'Requisites'!!}:</b><br>
                        {!! $_SESSION['lang'] == "RU"? $contacts[0]->requisites_ru:$contacts[0]->requisites_en !!}
                    <br>
                    <p>{!! $_SESSION['lang'] == "RU"? $contacts[0]->taxID_ru:$contacts[0]->taxID_en !!}</p>
                    <p>{!! $_SESSION['lang'] == "RU"? $contacts[0]->orgID_ru:$contacts[0]->orgID_en !!}</p>
                </div>
                <div class="col-sm-6">
                    <h2 class="roboto">{!! $_SESSION['lang'] == "RU"? 'Напишите нам':'Write to us'!!}</h2>
                    <br>
                    <form action="" method="POST" role="form" class="input-block">
                        <div class="form-group">
                            <input type="text" value="" required class="form-control" name="fio" onkeyup="this.setAttribute('value', this.value);">
                            <label class="font-light" for="fio">{!! $_SESSION['lang'] == "RU"? 'Ваше имя':'Name'!!}</label>
                        </div>
                        <div class="form-group">
                            <input type="text" value="" required class="form-control phone-mask" pattern="\W\d{3} \W\d{2}\W \d{3}-\d{2}-\d{2}" name="phone" onkeyup="this.setAttribute('value', this.value);">
                            <label class="font-light" for="phone">{!! $_SESSION['lang'] == "RU"? 'Номер телефона':'Phone'!!}</label>
                        </div>
                        <div class="form-group">
                            <input type="email" value="" required class="form-control" name="email" onkeyup="this.setAttribute('value', this.value);">
                            <label class="font-light" for="email">{!! $_SESSION['lang'] == "RU"? 'Ваш e-mail':'E-mail'!!}</label>
                        </div>
                        <div class="form-group">
                            <textarea name="message" value="" id="" class="form-control" cols="30" rows="10"  onkeyup="this.setAttribute('value', this.value);"></textarea>
                            <label class="font-light" for="phone">{!! $_SESSION['lang'] == "RU"? 'Ваше сообщение':'Message'!!}</label>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary font-bold">{!! $_SESSION['lang'] == "RU"? 'ОТПРАВИТЬ':'SUBMIT'!!}</button>
                        </div>
                    </form>
                </div>
            </div>
            <h2 class="roboto">{!! $_SESSION['lang'] == "RU"? 'Как нас найти':'How to find us'!!}</h2>
            <br>
        </div>
    </div>
    <div class="row map">
        <div class="map-wrapper">
            <div id="map"></div>
        </div>
    </div>
</div>

@stop