<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblHrEmpPassortTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_hr_emp_passport', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('emp_number');
            $table->integer('ep_seqno');
            $table->string('ep_passport_num');
            $table->dateTime('ep_passportissueddate');
            $table->dateTime('ep_passportexpiredate');
            $table->string('ep_comment');
            $table->smallInteger('ep_passport_type_flg');
            $table->string('ep_i9_status');
            $table->date('ep_i9_review_date');
            $table->string('cou_code');
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
        Schema::dropIfExists('tbl_hr_emp_passort');
    }
}
