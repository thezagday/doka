@extends ('main')
@section('content')

<div class="container-fluid">
    <div class="row breadcrumb">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li>
                    <a href="/">{!! $_SESSION['lang'] == "RU"? 'Главная':'Home'!!}</a>
                </li>
                <li class="active">{!! $_SESSION['lang'] == "RU"? 'Продукция и услуги':'Products and services'!!}</li>
            </ol>
        </div>
    </div>
</div>

<div class="container-fluid content">
    <br>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                @for($i = 0; $i < count($catalog); $i++)
                    @if($i == 0)
                        <div class="col-sm-12">
                            <a href="{!! $catalog[$i]->alias !!}" class="catalog-wrapper">
                                <img src="{!! $catalog[$i]->img !!}" alt="image">
                                <div class="catalog-block">
                                    <h2>{!! $_SESSION['lang'] == "RU" ? $catalog[$i]->title_ru:$catalog[$i]->title_en !!}</h2>
                                    <ul>
                                        {!! $_SESSION['lang'] == "RU" ? $catalog[$i]->desc_ru:$catalog[$i]->desc_en !!}
                                    </ul>
                                </div>
                            </a>
                        </div>
                    @else
                        <div class="col-sm-6">
                            <a href="{!! $catalog[$i]->alias !!}" class="catalog-wrapper">
                                <img src="{!! $catalog[$i]->img !!}" alt="image">
                                <div class="catalog-block">
                                    <h2>{!! $_SESSION['lang'] == "RU" ? $catalog[$i]->title_ru:$catalog[$i]->title_en !!}</h2>
                                </div>
                            </a>
                        </div>
                    @endif
                @endfor
            </div>
        </div>
    </div>
    <br>
</div>

@stop