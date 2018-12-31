<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblHrEmpEmergencyContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_hr_emp_emergency_contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('emp_number');
            $table->decimal('eec_seqno');
            $table->string('eec_name');
            $table->string('eec_relationship');
            $table->string('eec_home_no');
            $table->string('eec_mobile_no');
            $table->string('eec_office_no');
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
        Schema::dropIfExists('tbl_hr_emp_emergency_contacts');
    }
}
