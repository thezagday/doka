@extends('admin_main')
@section('content')
    <div class="layout-content">
        <div class="layout-content-body">
            <h1 class="title-bar-title">Редактирование раздела "Скачать каталог" </h1>
            <p class="title-bar-description">Тут вы можете отредактировать раздел "Скачать каталог" </p>
            <div class="row">
                <div class="col-md-8">
                    <div class="demo-form-wrapper">
                        <form action="add_document" method="post" class="form form-horizontal" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{!! $doc->id !!}">
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1">{{ $name }}</label>
                                <div class="col-sm-9">
                                    <ul class="file-list">
                                        <li class="file">
                                            <a class="file-link" href="{{ $doc->path_doc }}" title="{{ $doc->path_doc }}" download="{{ $doc->path_doc }}">
                                                <div class="file-thumbnail" style="background-image: url({{ URL::asset('pdf.svg') }})"></div>
                                                <div class="file-info">
                                                    <span class="file-ext"></span>
                                                    <span class="file-name"></span>
                                                </div>
                                            </a>
                                            <!--<a href="delete_certificates">
                                                <span class="icon icon-remove"> Удалить</span>
                                            </a>-->
                                        </li>
                                    </ul>
                                    <label class="drive-uploader-btn btn btn-primary">
                                        <input class="drive-uploader-input" type="file" name="path_doc">
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn-primary">Изменить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop



