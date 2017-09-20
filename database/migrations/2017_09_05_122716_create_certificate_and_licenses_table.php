<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCertificateAndLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificate_and_licenses', function (Blueprint $table) {
            $table->increments('id');

            $table->string('prev_img')->nullable();
            $table->string('img')->nullable();
            $table->boolean('doc')->nullable();

            // 0 - сертификат, 1 - лицензия
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('certificate_and_licenses');
    }
}
