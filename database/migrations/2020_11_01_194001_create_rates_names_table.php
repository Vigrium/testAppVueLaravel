<?php

use App\RatesNames;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatesNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('rates_names', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('short_name')->nullable();
            $table->string('img')->nullable();
            $table->timestamps();
        });
        $arNames = [
            'rub',
            'eur',
            'usd'
        ];
        foreach ($arNames as $name) {
            $rate = new RatesNames();
            $rate->name = $name;
            $rate->save();
        }


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rates_names');
    }
}
