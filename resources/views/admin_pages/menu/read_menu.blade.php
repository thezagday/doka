@extends('admin_main')
@section('content')
    <div class="layout-content">
        <div class="layout-content-body">
            <h1 class="title-bar-title">Редактирование раздела "Меню"</h1>
            <p class="title-bar-description">Тут вы можете отредактировать пункты меню </p>
            <div class="row">
                <div class="col-md-8">
                    <div class="demo-form-wrapper">
                        <form action="" method="post" class="form form-horizontal">
                            {{ csrf_field() }}
                            @foreach ($menu as $item)
                                <input type="hidden" name="id" value="{{$item->id}}" disabled=""/>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="form-control-1"></label>
                                    <div class="col-sm-9">
                                        <div class="list-group">
                                            <a class="list-group-item" href="edit_item_menu?id={{$item->id}}">
                                                <div class="media">
                                                    <div class="media-middle media-body">
                                                        <h5 class="media-heading">{{$item->title_ru}} ({!! $item->title_en !!})</h5>
                                                    </div>
                                                    <div class="media-middle media-right">
                                                        <span class="icon icon-pencil"></span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

