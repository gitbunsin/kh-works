<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeWorkExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_work_experiences', function (Blueprint $table) {
            $table->increments('id');


            $table->integer('emp_number')->unsigned()->nullable();
            $table->foreign('emp_number')->references('emp_number')->on('employees')->onDelete('cascade');
            $table->string('eexp_seqno')->nullable();
            $table->string('eexp_employer')->nullable();
            $table->string('eexp_jobtitle')->nullable();
            $table->string('eexp_from_date')->nullable();
            $table->string('eexp_to_date')->nullable();
            $table->string('eexp_comments')->nullable();
            $table->integer('eexp_internal')->nullable();


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
        Schema::dropIfExists('employee_work_experiences');
    }
}
