<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title_ru')->nullable();
            $table->string('title_en')->nullable();

            $table->text('desc_ru')->nullable();
            $table->text('desc_en')->nullable();

            $table->timestamps();
        });

        \App\Stock::create([
            'title_ru'=>'Продукция на складе ДОКА в Барановичах',
            'title_en'=>'Products in the warehouse of the DOKA in Baranavichy',
            'desc_ru'=>'Общество с ограниченной ответственностью «ДОКА» со дня своего основания в 2001 году успешно осуществляет деятельность в сфере ремонта и модернизации специфических товаров. За годы плодотворной работы предприятием накоплен огромный опыт, позволяющий на высоком уровне выполнять свои обязательства и решать поставленные задачи в сжатые сроки.',
            'desc_en'=>'Limited Liability Company "DOCA" has been successfully operating in the field of repair and modernization of specific products since its founding in 2001. During the years of fruitful work, the company has accumulated vast experience, which allows it to fulfill its obligations at a high level and to meet the set tasks in a short time.'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocks');
    }
}
