<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeaveAdjustmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave_adjustments', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('company_id')->unsigned()->nullable();
            $table->foreign('company_id')->references('id')->on('organization_gen_infos')->onDelete('cascade');


            $table->integer('emp_number')->unsigned()->nullable();
            $table->foreign('emp_number')->references('emp_number')->on('employees')->onDelete('cascade');


            $table->integer('adjustment_type')->unsigned()->nullable();
            $table->foreign('adjustment_type')->references('id')->on('leave_entitlement_types')->onDelete('cascade');


            $table->integer('leave_type_id')->unsigned()->nullable();
            $table->foreign('leave_type_id')->references('id')->on('leave_types')->onDelete('cascade');


            $table->string('create_by_name')->nullable();
            $table->string('no_of_day')->nullable();
            $table->date('from_date')->nullable();
            $table->date('to_date')->nullable();
            $table->text('note')->nullable();
            $table->smallInteger('is_deleted')->nullable();

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
        Schema::dropIfExists('leave_adjustments');
    }
}
