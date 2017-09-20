<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title_ru')->nullable();
            $table->string('title_en')->nullable();

            $table->string('prev_text1_ru')->nullable();
            $table->string('prev_text1_en')->nullable();

            $table->string('prev_text2_ru')->nullable();
            $table->string('prev_text2_en')->nullable();

            $table->text('desc_ru')->nullable();
            $table->text('desc_en')->nullable();

            $table->string('img')->nullable();

            $table->date('date')->nullable();

            $table->timestamps();
        });

        \App\News::create([
            'title_ru' => 'На склад поступили новые модели авиатехники 1',
            'title_en' => 'The warehouse received new models of aircraft 1',
            'prev_text1_ru' => 'Предлагаем ознакомиться подробнее с продукцией. Предлагаем ознакомиться подробнее с продукцией',
            'prev_text1_en' => 'We offer you to read more about the products. We offer you to read more about the products',
            'prev_text2_ru' => 'Предлагаем ознакомиться подробнее с продукцией. Предлагаем ознакомиться подробнее с продукцией Предлагаем ознакомиться подробнее с продукцией. Предлагаем ознакомиться подробнее с продукцией',
            'prev_text2_en' => 'We offer you to read more about the products. We offer you to read more about the products We offer you to read more about the products. We offer you to read more about the products',
            'img' => 'img.gif',
            'date' =>'2017-05-09'
        ]);

        \App\News::create([
            'title_ru' => 'На склад поступили новые модели авиатехники 2',
            'title_en' => 'The warehouse received new models of aircraft 2',
            'prev_text1_ru' => 'Предлагаем ознакомиться подробнее с продукцией. Предлагаем ознакомиться подробнее с продукцией',
            'prev_text1_en' => 'We offer you to read more about the products. We offer you to read more about the products',
            'prev_text2_ru' => 'Предлагаем ознакомиться подробнее с продукцией. Предлагаем ознакомиться подробнее с продукцией Предлагаем ознакомиться подробнее с продукцией. Предлагаем ознакомиться подробнее с продукцией',
            'prev_text2_en' => 'We offer you to read more about the products. We offer you to read more about the products We offer you to read more about the products. We offer you to read more about the products',
            'img' => 'img.gif',
            'date' =>'2017-05-09'
        ]);

        \App\News::create([
            'title_ru' => 'На склад поступили новые модели авиатехники 3',
            'title_en' => 'The warehouse received new models of aircraft 3',
            'prev_text1_ru' => 'Предлагаем ознакомиться подробнее с продукцией. Предлагаем ознакомиться подробнее с продукцией',
            'prev_text1_en' => 'We offer you to read more about the products. We offer you to read more about the products',
            'prev_text2_ru' => 'Предлагаем ознакомиться подробнее с продукцией. Предлагаем ознакомиться подробнее с продукцией Предлагаем ознакомиться подробнее с продукцией. Предлагаем ознакомиться подробнее с продукцией',
            'prev_text2_en' => 'We offer you to read more about the products. We offer you to read more about the products We offer you to read more about the products. We offer you to read more about the products',
            'img' => 'img.gif',
            'date' =>'2017-05-09'
        ]);

        \App\News::create([
            'title_ru' => 'На склад поступили новые модели авиатехники 4',
            'title_en' => 'The warehouse received new models of aircraft 4',
            'prev_text1_ru' => 'Предлагаем ознакомиться подробнее с продукцией. Предлагаем ознакомиться подробнее с продукцией',
            'prev_text1_en' => 'We offer you to read more about the products. We offer you to read more about the products',
            'prev_text2_ru' => 'Предлагаем ознакомиться подробнее с продукцией. Предлагаем ознакомиться подробнее с продукцией Предлагаем ознакомиться подробнее с продукцией. Предлагаем ознакомиться подробнее с продукцией',
            'prev_text2_en' => 'We offer you to read more about the products. We offer you to read more about the products We offer you to read more about the products. We offer you to read more about the products',
            'img' => 'img.gif',
            'date' =>'2017-05-09'
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
