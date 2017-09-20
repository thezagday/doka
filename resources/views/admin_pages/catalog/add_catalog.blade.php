@extends('admin_main')
@section('content')
    <div class="layout-content">
        <div class="layout-content-body">
            <h1 class="title-bar-title">Создание нового каталога</h1>
            <p class="title-bar-description">Тут вы можете добавить новый каталог</p>
            <div class="row">
                <div class="col-md-8">
                    <div class="demo-form-wrapper">
                        <form action="/add_catalog" method="post" class="form form-horizontal" enctype="multipart/form-data">
                            <p>
                            {{ csrf_field() }}
                            @if(isset($error))
                                    <h4>{!! $error !!}</h4>
                            @endif
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1">Alias</label>
                                <div class="col-sm-9">
                                    <input id="form-control-1" class="form-control" type="text" name="alias" value="" required="required" placeholder="Значение этого поля не должно совпадать с алиасами других каталогов" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1">Картинка</label>
                                <div class="col-sm-9">
                                    <input id="form-control-1" class="form-control" type="text" name="img" value="" >
                                    <input type="file" name="img">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1">Заголовок (RU)</label>
                                <div class="col-sm-9">
                                    <input id="form-control-1" class="form-control" type="text" name="title_ru" value="" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1">Заголовок (EN)</label>
                                <div class="col-sm-9">
                                    <input id="form-control-1" class="form-control" type="text" name="title_en" value="" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1">Описание (RU)</label>
                                <div class="col-sm-9">
                                    <textarea id="textarea-1" class="form-control" rows="5" name ="desc_ru"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1">Описание (EN)</label>
                                <div class="col-sm-9">
                                    <textarea id="textarea-2" class="form-control" rows="5" name ="desc_en"></textarea>
                                </div>
                            </div>
                            </p>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn-primary" id="input_btn">Сохранить</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1"></label>
                                <div class="col-sm-9">
                                    <a href="/read_catalog"> Назад к редактированию</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop