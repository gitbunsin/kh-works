<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeEmergencyContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_emergency_contacts', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('emp_number')->unsigned()->nullable();
            $table->foreign('emp_number')->references('emp_number')->on('employees')->onDelete('cascade');

            $table->decimal('eec_seqno')->nullable();
            $table->string('eec_name')->nullable();
            $table->string('eec_relationship')->nullable();
            $table->string('eec_home_no')->nullable();
            $table->string('eec_mobile_no')->nullable();
            $table->string('eec_office_no')->nullable();

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
        Schema::dropIfExists('employee_emergency_contacts');
    }
}
