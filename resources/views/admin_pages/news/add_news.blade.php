@extends('admin_main')
@section('content')
    <div class="layout-content">
        <div class="layout-content-body">
            <h1 class="title-bar-title">Добавление новости</h1>
            <p class="title-bar-description">Тут вы можете добавить новую новость </p>
            <div class="row">
                <div class="col-md-8">
                    <div class="demo-form-wrapper">
                        <form action="add_news" method="post" class="form form-horizontal" enctype="multipart/form-data">
                            <p>
                            {{ csrf_field() }}

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
                                <label class="col-sm-3 control-label" for="form-control-1">Предварительный текст 1 (RU)</label>
                                <div class="col-sm-9">
                                    <input id="form-control-1" class="form-control" type="text" name="prev_text1_ru" value="" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1">Предварительный текст 1 (EN)</label>
                                <div class="col-sm-9">
                                    <input id="form-control-1" class="form-control" type="text" name="prev_text1_en" value="" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1">Предварительный текст 2 (RU)</label>
                                <div class="col-sm-9">
                                    <textarea id="textarea-1" class="form-control" rows="5" name ="prev_text2_ru"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1">Предварительный такст 2 (EN)</label>
                                <div class="col-sm-9">
                                    <textarea id="textarea-2" class="form-control" rows="5" name ="prev_text2_en"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1">Текст (RU)</label>
                                <div class="col-sm-9">
                                    <textarea id="textarea-3" class="form-control" rows="5" name ="desc_ru"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1">Текст (EN)</label>
                                <div class="col-sm-9">
                                    <textarea id="textarea-4" class="form-control" rows="5" name ="desc_en"></textarea>
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
                                <label class="col-sm-3 control-label" for="form-control-1">Дата</label>
                                <div class="col-sm-9">
                                    <input id="form-control-1" class="form-control" type="text" name="date" value="" >
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
