<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevelopmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('developments', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title_ru')->nullable();
            $table->string('title_en')->nullable();

            $table->text('desc_ru')->nullable();
            $table->text('desc_en')->nullable();

            $table->timestamps();
        });

        \App\Development::create([
            'title_ru'=>'Опытно-конструкторские работы по модернизации и разработке средств обеспечения полетов в Барановичах',
            'title_en'=>'Experimental design work on modernization and development of flight support facilities in Baranavichy',
            'desc_ru'=>'Модернизация различных видов оборудования, спецтехники военного назначения, а также разработка новых средств обеспечения полетов – одно из важнейших направлений деятельности ООО «ДОКА» . Своей целью предприятие ставит улучшение технических и эксплуатационных показателей, повышение производительности и износоустойчивости машин и агрегатов. Реализация утвержденных разработок с доказанной эффективностью позволяет повысить продуктивность работы компании «ДОКА», увеличив ее авторитет перед деловыми партнерами как белорусскими, так и зарубежными. Рост доверия со стороны заказчиков служит дополнительным стимулом для работы специалистов предприятия.',
            'desc_en'=>'Modernization of various types of equipment, military equipment, as well as the development of new means of flight support is one of the most important activities of DOCA LLC. Its goal is to improve the technical and operational performance, increase the productivity and durability of machines and units. The implementation of approved development with proven effectiveness allows to increase the productivity of the company "DOCA", increasing its credibility before business partners, both Belarusian and foreign. The growth of trust on the part of customers serves as an additional incentive for the work of the company\'s specialists.'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('developments');
    }
}
