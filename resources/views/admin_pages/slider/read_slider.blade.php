@extends('admin_main')
@section('content')
    <div class="layout-content">
        <div class="layout-content-body">
            <h1 class="title-bar-title">Редактирование раздела "Слайдер"</h1>
            <p class="title-bar-description">Тут вы можете отредактировать слайдер </p>
            <div class="row">
                <div class="col-md-8">
                    <div class="demo-form-wrapper">
                        <form action="" method="" class="form form-horizontal">
                            @foreach ($slider as $item)
                                <p>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="form-control-1"></label>
                                    <div class="col-sm-9">
                                        <div class="list-group">
                                            <a class="list-group-item" href="edit_item_slider?id={{$item->id}}">
                                                <div class="media">
                                                    <div class="media-middle media-body">
                                                        <h5 class="media-heading">{{strip_tags($item->title_ru)}} ({{strip_tags($item->title_en)}})</h5>
                                                    </div>
                                                    <div class="media-middle media-right">
                                                        <span class="icon icon-pencil"></span>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="list-group-item" href="delete_item_slider?id={{$item->id}}">
                                                <div class="media">
                                                    <div class="media-middle media-body">
                                                        <h5 class="media-heading"><small>Удалить</small></h5>
                                                    </div>
                                                    <div class="media-middle media-right">
                                                        <span class="icon icon-remove"></span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                </p>
                            @endforeach
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="form-control-1"></label>
                                <div class="col-sm-9">
                                    <input type="button" class="btn-primary" id="input_btn" value="Добавить" onClick='location.href="add_slider"'>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

