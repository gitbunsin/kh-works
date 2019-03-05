<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeMemberDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_member_details', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('emp_number')->unsigned()->nullable();
            $table->foreign('emp_number')->references('emp_number')->on('employees')->onDelete('cascade');


            $table->integer('membership_code')->unsigned()->nullable();
            $table->foreign('membership_code')->references('id')->on('memberships')->onDelete('cascade');

            $table->string('ememb_subscript_ownership')->nullable();
            $table->decimal('ememb_subscript_amount')->nullable();
            $table->string('ememb_subs_currency')->nullable();
            $table->date('ememb_commence_date')->nullable();
            $table->date('ememb_renewal_date')->nullable();

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
        Schema::dropIfExists('employee_member_details');
    }
}
