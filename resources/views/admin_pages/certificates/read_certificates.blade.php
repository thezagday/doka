@extends('admin_main')
@section('content')
    <div class="layout-content">
        <div class="layout-content-body">
            <h1 class="title-bar-title">Редактирование раздела "Сертификаты и лицензии" </h1>
            <p class="title-bar-description">Тут вы можете отредактировать картинки из раздела "Сертификаты и лицензии" </p>
            <div class="row">
                <div class="col-md-8">
                    <div class="demo-form-wrapper">
                        <form action="add_certificates" method="post" class="form form-horizontal" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1">Сертификаты</label>
                                <div class="col-sm-9">
                                    <ul class="file-list">
                                        @foreach ($certificates as $cert)
                                            <li class="file">
                                                <a class="file-link" href="{{$cert->img}}" title="{{$cert->img}}" download="{{$cert->img}}">
                                                    <div class="file-thumbnail" style="background-image: url({{$cert->img}})"></div>
                                                    <div class="file-info">
                                                        <span class="file-ext"></span>
                                                        <span class="file-name"></span>
                                                    </div>
                                                </a>
                                                <a href="delete_certificates?id={{$cert->id}}">
                                                    <span class="icon icon-remove"> Удалить</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <label class="drive-uploader-btn btn btn-primary">
                                        <input class="drive-uploader-input" type="file" name="img_cert">
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1">Лицензии</label>
                                <div class="col-sm-9">
                                    <ul class="file-list">
                                        @foreach ($licenses as $lic)
                                            <li class="file">
                                                <a class="file-link" href="{{$lic->img}}" title="{{$lic->img}}" download="{{$lic->img}}">
                                                    <div class="file-thumbnail" style="background-image: url({{$lic->img}})"></div>
                                                    <div class="file-info">
                                                        <span class="file-ext"></span>
                                                        <span class="file-name"></span>
                                                    </div>
                                                </a>
                                                <a href="delete_certificates?id={{$lic->id}}">
                                                    <span class="icon icon-remove"> Удалить</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <label class="drive-uploader-btn btn btn-primary">
                                        <input class="drive-uploader-input" type="file" name="img_lic">
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn-primary">Добавить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop



