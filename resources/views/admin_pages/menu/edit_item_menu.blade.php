@extends('admin_main')
@section('content')
    <div class="layout-content">
        <div class="layout-content-body">
            <h1 class="title-bar-title">Редактирование "{{$item_menu->title_ru}}" ("{{$item_menu->title_en}}")</h1>
            <p class="title-bar-description">Тут вы можете отредактировать пункт меню "{{$item_menu->title_ru}}" ("{{$item_menu->title_en}}")</p>
            <div class="row">
                <div class="col-md-8">
                    <div class="demo-form-wrapper">
                        <form action="update_item_menu" method="post" class="form form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{$item_menu->id}}"/>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1">Заголовок (RU)</label>
                                <div class="col-sm-9">
                                    <input id="form-control-1" class="form-control" type="text" name="title_ru" value="{{$item_menu->title_ru}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1">Заголовок (EN)</label>
                                <div class="col-sm-9">
                                    <input id="form-control-1" class="form-control" type="text" name="title_en" value="{{$item_menu->title_en}}">
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



