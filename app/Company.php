<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['title_ru','tile_en','desc_ru','desc_en','video'];
}
