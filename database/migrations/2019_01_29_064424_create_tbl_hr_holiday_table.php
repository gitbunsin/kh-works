<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblHrHolidayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_hr_holiday', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id');
            $table->string('name');
            $table->string('description');
            $table->dateTime('date');
            $table->integer('recurring');
            $table->integer('length');
            $table->integer('operational_country_id');
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
        Schema::dropIfExists('tbl_hr_holiday');
    }
}
