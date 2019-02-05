<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblHrEmpDependentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_hr_emp_dependents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('emp_number');
            $table->decimal('ed_seqno');
            $table->string('ed_name');
            $table->string('ed_relationship_type');
            $table->dateTime('ed_date_of_birth');
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
        Schema::dropIfExists('tbl__hr_emp_dependents');
    }
}
