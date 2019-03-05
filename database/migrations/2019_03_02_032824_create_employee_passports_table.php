<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeePassportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_passports', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('emp_number')->unsigned()->nullable();
            $table->foreign('emp_number')->references('emp_number')->on('employees')->onDelete('cascade');

            $table->string('eq_seqno')->nullable();
            $table->string('eq_passport_num')->nullable();
            $table->date('ep_passportissueddate')->nullable();
            $table->date('ep_passportexpiredate')->nullable();
            $table->string('ep_comments')->nullable();
            $table->string('ep_passport_type_flg')->nullable();
            $table->string('ep_i9_status')->nullable();
            $table->string('ep_i9_review_date')->nullable();
            $table->string('cou_code')->nullable();


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
        Schema::dropIfExists('employee_passports');
    }
}
