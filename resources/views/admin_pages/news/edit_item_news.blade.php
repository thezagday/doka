@extends('admin_main')
@section('content')
    <div class="layout-content">
        <div class="layout-content-body">
            <h1 class="title-bar-title">Редактирование новости</h1>
            <p class="title-bar-description">Тут вы можете отредактировать новость "{!! $item_news->title_ru !!}" ("{!! $item_news->title_en !!}")</p>
            <div class="row">
                <div class="col-md-8">
                    <div class="demo-form-wrapper">
                        <form action="update_item_news" method="post" class="form form-horizontal" enctype="multipart/form-data">
                            <p>
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{$item_news->id}}">

                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1">Заголовок (RU)</label>
                                <div class="col-sm-9">
                                    <input id="form-control-1" class="form-control" type="text" name="title_ru" value="{{$item_news->title_ru}}" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1">Заголовок (EN)</label>
                                <div class="col-sm-9">
                                    <input id="form-control-1" class="form-control" type="text" name="title_en" value="{{$item_news->title_en}}" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1">Предварительный текст 1 (RU)</label>
                                <div class="col-sm-9">
                                    <input id="form-control-1" class="form-control" type="text" name="prev_text1_ru" value="{{$item_news->prev_text1_ru}}" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1">Предварительный текст 1 (EN)</label>
                                <div class="col-sm-9">
                                    <input id="form-control-1" class="form-control" type="text" name="prev_text1_en" value="{{$item_news->prev_text1_en}}" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1">Предварительный текст 2 (RU)</label>
                                <div class="col-sm-9">
                                    <textarea id="textarea" class="form-control" rows="5" name ="prev_text2_ru">{{$item_news->prev_text2_ru}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1">Предварительный такст 2 (EN)</label>
                                <div class="col-sm-9">
                                    <textarea id="textarea" class="form-control" rows="5" name ="prev_text2_en">{{$item_news->prev_text2_en}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1">Текст (RU)</label>
                                <div class="col-sm-9">
                                    <textarea id="textarea-1" class="form-control" rows="5" name ="desc_ru">{{$item_news->desc_ru}}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1">Текст (EN)</label>
                                <div class="col-sm-9">
                                    <textarea id="textarea-2" class="form-control" rows="5" name ="desc_en">{{$item_news->desc_en}}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1">Картинка</label>
                                <div class="col-sm-9">
                                    <input id="form-control-1" class="form-control" type="text" name="img" value="{{$item_news->img}}" >
                                    <input type="file" name="img">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1">Дата</label>
                                <div class="col-sm-9">
                                    <div class="input-with-icon">
                                        <input class="form-control" type="text" data-provide="datepicker" name="date" value="{{$item_news->date}}">
                                        <span class="icon icon-calendar input-icon"></span>
                                    </div>
                                </div>
                            </div>

                            </p>
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
