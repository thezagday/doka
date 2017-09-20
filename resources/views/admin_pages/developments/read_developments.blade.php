@extends('admin_main')
@section('content')
    <div class="layout-content">
        <div class="layout-content-body">
            <h1 class="title-bar-title">Редактирование раздела "Разработки"</h1>
            <p class="title-bar-description">Тут вы можете отредактировать раздел "Разработки"</p>
            <div class="row">
                <div class="col-md-8">
                    <div class="demo-form-wrapper">
                        <form action="/update_developments" method="post" class="form form-horizontal" enctype="multipart/form-data">
                            <p>
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{$item_development->id}}">

                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1">Заголовок (RU)</label>
                                <div class="col-sm-9">
                                    <textarea id="textarea" class="form-control" rows="5" name ="title_ru">{{$item_development->title_ru}}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1">Заголовок (EN)</label>
                                <div class="col-sm-9">
                                    <textarea id="textarea" class="form-control" rows="5" name ="title_en">{{$item_development->title_en}}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1">Описание (RU)</label>
                                <div class="col-sm-9">
                                    <textarea id="textarea-1" class="form-control" rows="15" name ="desc_ru">{{$item_development->desc_ru}}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1">Описание (EN)</label>
                                <div class="col-sm-9">
                                    <textarea id="textarea-2" class="form-control" rows="15" name ="desc_en">{{$item_development->desc_en}}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1">Картинки</label>
                                <div class="col-sm-9">
                                    <ul class="file-list">
                                        @foreach ($images as $image)
                                            <li class="file">
                                                <a class="file-link" href="{{$image->img}}" title="{{$image->img}}" download="{{$image->img}}">
                                                    <div class="file-thumbnail" style="background-image: url({{$image->img}})"></div>
                                                    <div class="file-info">
                                                        <span class="file-ext"></span>
                                                        <span class="file-name"></span>
                                                    </div>
                                                </a>
                                                <a href="/delete_developments_images?id={{$image->id}}">
                                                    <span class="icon icon-remove"> Удалить</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <label class="drive-uploader-btn btn btn-primary">
                                        <input class="drive-uploader-input" type="file" name="img">
                                    </label>
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