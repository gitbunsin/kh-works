<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeBasicSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_basic_salaries', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('organization_code')->unsigned()->nullable();
            $table->foreign('organization_code')->references('id')->on('organization_gen_infos')->onDelete('cascade');

            $table->integer('emp_number')->unsigned()->nullable();
            $table->foreign('emp_number')->references('emp_number')->on('employees')->onDelete('cascade');

            $table->integer('sal_grd_code')->unsigned()->nullable();
            $table->foreign('sal_grd_code')->references('id')->on('Paygrades')->onDelete('cascade');

            $table->integer('currency_id')->unsigned()->nullable();
            $table->foreign('currency_id')->references('id')->on('currencies')->onDelete('cascade');


            $table->integer('payperiod_code')->unsigned()->nullable();
            $table->foreign('payperiod_code')->references('id')->on('payperiods')->onDelete('cascade');

            $table->string('ebsal_basic_salary')->nullable();
            $table->string('salary_component')->nullable();
            $table->string('comments')->nullable();




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
        Schema::dropIfExists('employee_basic_salaries');
    }
}
