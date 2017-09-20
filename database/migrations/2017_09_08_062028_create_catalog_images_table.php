<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatalogImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalog_images', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('img')->nullable();
            $table->integer('parent');

            $table->timestamps();
        });

        \App\CatalogImage::create([
            'img'=>'img',
            'parent' =>1
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catalog_images');
    }
}
