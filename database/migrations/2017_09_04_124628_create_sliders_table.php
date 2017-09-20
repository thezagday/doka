<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title_ru',255)->nullable();
            $table->string('title_en',255)->nullable();

            $table->text('desc_ru')->nullable();
            $table->text('desc_en')->nullable();

            $table->string('img')->nullable();

            $table->timestamps();
        });

        \App\Slider::create([
            'title_ru' => 'Ремонт, пусконаладка и восстановление1',
            'title_en' => 'Repair, commissioning and restoration1',
            'desc_ru' => "<li>Средства связи и радиотехнического обеспечения</li><li>Электронных блоков и радиоэлектронного управления</li><li>Средств наземного обеспечения полетов</li>",
            'desc_en' => "<li>Means of Communication and Radio Equipment</li><li>Electronic Blocks and Radio Electronic Control</li><li>Ground Support Facilities</li>",
            'img' => 'img.gif'
        ]);

        \App\Slider::create([
            'title_ru' => 'Ремонт, пусконаладка и восстановление2',
            'title_en' => 'Repair, commissioning and restoration2',
            'desc_ru' => "<li>Средства связи и радиотехнического обеспечения</li><li>Электронных блоков и радиоэлектронного управления</li><li>Средств наземного обеспечения полетов</li>",
            'desc_en' => "<li>Means of Communication and Radio Equipment</li><li>Electronic Blocks and Radio Electronic Control</li><li>Ground Support Facilities</li>",
            'img' => 'img.gif'
        ]);

        \App\Slider::create([
            'title_ru' => 'Ремонт, пусконаладка и восстановление3',
            'title_en' => 'Repair, commissioning and restoration3',
            'desc_ru' => "<li>Средства связи и радиотехнического обеспечения</li><li>Электронных блоков и радиоэлектронного управления</li><li>Средств наземного обеспечения полетов</li>",
            'desc_en' => "<li>Means of Communication and Radio Equipment</li><li>Electronic Blocks and Radio Electronic Control</li><li>Ground Support Facilities</li>",
            'img' => 'img.gif'
        ]);

        \App\Slider::create([
            'title_ru' => 'Ремонт, пусконаладка и восстановление4',
            'title_en' => 'Repair, commissioning and restoration4',
            'desc_ru' => "<li>Средства связи и радиотехнического обеспечения</li><li>Электронных блоков и радиоэлектронного управления</li><li>Средств наземного обеспечения полетов</li>",
            'desc_en' => "<li>Means of Communication and Radio Equipment</li><li>Electronic Blocks and Radio Electronic Control</li><li>Ground Support Facilities</li>",
            'img' => 'img.gif'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sliders');
    }
}
