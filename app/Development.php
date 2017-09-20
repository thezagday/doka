<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Development extends Model
{
    protected $fillable = ['title_ru','title_en','desc_ru','desc_en'];
}
