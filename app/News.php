<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title_ru','title_en','prev_text1_ru','prev_text1_en','prev_text2_ru','prev_text2_en','desc_ru','desc_en','img','date'];
}
