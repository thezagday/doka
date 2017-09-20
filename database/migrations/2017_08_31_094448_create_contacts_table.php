<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');

            $table->string('mail_address_ru')->nullable();
            $table->string('mail_address_en')->nullable();

            $table->string('legal_address_ru')->nullable();
            $table->string('legal_address_en')->nullable();

            $table->string('additional_info_ru')->nullable();
            $table->string('additional_info_en')->nullable();

            $table->string('phone1')->nullable();
            $table->string('phone2')->nullable();
            $table->string('phone3')->nullable();
            $table->string('phone4')->nullable();
            $table->string('phone5')->nullable();
            $table->string('phone6')->nullable();

            $table->string('mail1')->nullable();
            $table->string('mail2')->nullable();

            $table->string('requisites_ru')->nullable();
            $table->string('requisites_en')->nullable();

            $table->string('taxID_ru')->nullable();
            $table->string('taxID_en')->nullable();

            $table->string('orgID_ru')->nullable();
            $table->string('orgID_en')->nullable();

            $table->string('country_ru')->nullable();
            $table->string('country_en')->nullable();

            $table->integer('index1')->nullable();
            $table->integer('index2')->nullable();

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
        Schema::dropIfExists('contacts');
    }
}
