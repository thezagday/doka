@extends('admin_main')
@section('content')
    <div class="layout-content">
        <div class="layout-content-body">
            <h1 class="title-bar-title">Редактирование контактов</h1>
            <p class="title-bar-description">Тут вы можете отредактировать информацию, которая может понадобиться посетителям сайта</p>
            <div class="row">
                <div class="col-md-8">
                    <div class="demo-form-wrapper">
                        <form action="update_contacts" method="post" class="form form-horizontal">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1">Почтовый адрес (RU)</label>
                                <div class="col-sm-9">
                                    <input id="form-control-1" class="form-control" type="text" name="mail_address_ru" value="{!!$contacts[0]->mail_address_ru!!}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1">Почтовый адрес (EN)</label>
                                <div class="col-sm-9">
                                    <input id="form-control-1" class="form-control" type="text" name="mail_address_en" value="{!!$contacts[0]->mail_address_en!!}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1">Юридический адрес (RU)</label>
                                <div class="col-sm-9">
                                    <input id="form-control-1" class="form-control" type="text" name="legal_address_ru" value="{!!$contacts[0]->legal_address_ru!!}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1">Юридический адрес (EN)</label>
                                <div class="col-sm-9">
                                    <input id="form-control-1" class="form-control" type="text" name="legal_address_en" value="{!!$contacts[0]->legal_address_en!!}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1">Дополнительная информация (RU)</label>
                                <div class="col-sm-9">
                                    <input id="form-control-1" class="form-control" type="text" name="additional_info_ru" value="{!!$contacts[0]->additional_info_ru!!}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1">Дополнительная информация (EN)</label>
                                <div class="col-sm-9">
                                    <input id="form-control-1" class="form-control" type="text" name="additional_info_en" value="{!!$contacts[0]->additional_info_en!!}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1">Телефон 1</label>
                                <div class="col-sm-9">
                                    <input id="form-control-1" class="form-control" type="text" name="phone1" value="{!!$contacts[0]->phone1!!}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1">Телефон 2</label>
                                <div class="col-sm-9">
                                    <input id="form-control-1" class="form-control" type="text" name="phone2" value="{!!$contacts[0]->phone2!!}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1">Телефон 3</label>
                                <div class="col-sm-9">
                                    <input id="form-control-1" class="form-control" type="text" name="phone3" value="{!!$contacts[0]->phone3!!}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1">Телефон 4</label>
                                <div class="col-sm-9">
                                    <input id="form-control-1" class="form-control" type="text" name="phone4" value="{!!$contacts[0]->phone4!!}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1">Телефон 5</label>
                                <div class="col-sm-9">
                                    <input id="form-control-1" class="form-control" type="text" name="phone5" value="{!!$contacts[0]->phone5!!}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1">Телефон 6</label>
                                <div class="col-sm-9">
                                    <input id="form-control-1" class="form-control" type="text" name="phone6" value="{!!$contacts[0]->phone6!!}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1">Почта 1</label>
                                <div class="col-sm-9">
                                    <input id="form-control-1" class="form-control" type="text" name="mail1" value="{!!$contacts[0]->mail1!!}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1">Почта 2</label>
                                <div class="col-sm-9">
                                    <input id="form-control-1" class="form-control" type="text" name="mail2" value="{!!$contacts[0]->mail2!!}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1">Реквизиты (RU)</label>
                                <div class="col-sm-9">
                                    <textarea id="textarea-1" rows="5" name="requisites_ru">{!! $contacts[0]->requisites_ru !!}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1">Реквизиты (EN)</label>
                                <div class="col-sm-9">
                                    <textarea id="textarea-2" rows="5" name="requisites_en">{!! $contacts[0]->requisites_en !!}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1">УНН (RU)</label>
                                <div class="col-sm-9">
                                    <input id="form-control-1" class="form-control" type="text" name="taxID_ru" value="{!!$contacts[0]->taxID_ru!!}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1">УНН (EN)</label>
                                <div class="col-sm-9">
                                    <input id="form-control-1" class="form-control" type="text" name="taxID_en" value="{!!$contacts[0]->taxID_en!!}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1">ОКПО (RU)</label>
                                <div class="col-sm-9">
                                    <input id="form-control-1" class="form-control" type="text" name="orgID_ru" value="{!!$contacts[0]->orgID_ru!!}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1">ОКПО (EN)</label>
                                <div class="col-sm-9">
                                    <input id="form-control-1" class="form-control" type="text" name="orgID_en" value="{!!$contacts[0]->orgID_en!!}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1">Страна (RU)</label>
                                <div class="col-sm-9">
                                    <input id="form-control-1" class="form-control" type="text" name="country_ru" value="{!!$contacts[0]->country_ru!!}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1">Страна (EN)</label>
                                <div class="col-sm-9">
                                    <input id="form-control-1" class="form-control" type="text" name="country_en" value="{!!$contacts[0]->country_en!!}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1">Индекс 1</label>
                                <div class="col-sm-9">
                                    <input id="form-control-1" class="form-control" type="text" name="index1" value="{!!$contacts[0]->index1!!}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1">Индекс 2</label>
                                <div class="col-sm-9">
                                    <input id="form-control-1" class="form-control" type="text" name="index2" value="{!!$contacts[0]->index2!!}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn-primary" id="input_btn">Сохранить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop



