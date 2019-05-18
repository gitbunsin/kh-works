<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('company_id')->unsigned()->nullable();
            $table->foreign('company_id')->references('id')->on('organization_gen_infos')->onDelete('cascade');

            $table->integer('emp_number')->unsigned()->nullable();
            $table->foreign('emp_number')->references('emp_number')->on('employees')->onDelete('cascade');

            $table->integer('leave_request_id')->unsigned()->nullable();
            $table->foreign('leave_request_id')->references('id')->on('leave_requests')->onDelete('cascade');



            $table->integer('leave_status')->unsigned()->nullable();
            $table->foreign('leave_status')->references('id')->on('leave_statuses')->onDelete('cascade');


//            $table->integer('leave_status')->unsigned()->nullable();
//            $table->foreign('leave_status')->references('id')->on('leave_statuses')->onDelete('cascade');



            $table->integer('leave_type_id')->unsigned()->nullable();
            $table->foreign('leave_type_id')->references('id')->on('leave_types')->onDelete('cascade');


            $table->string('created_by_name')->nullable();
            $table->decimal('length_hours')->nullable();
            $table->decimal('length_days')->nullable();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->smallInteger('duration_type')->nullable();

            $table->date('date')->nullable();

            $table->string('comment')->nullable();
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
        Schema::dropIfExists('leaves');
    }
}
