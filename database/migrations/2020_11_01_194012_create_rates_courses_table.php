<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatesCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('rates_courses')) {
            Schema::create('rates_courses', function (Blueprint $table) {
                $table->increments('id');
                $table->string('ratePair');
                $table->double('rateCourse');
                $table->timestamps();
            });
        }
        (new \App\Http\Controllers\Rates\CoursesContoller())->updateAll();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rates_courses');
    }
}
