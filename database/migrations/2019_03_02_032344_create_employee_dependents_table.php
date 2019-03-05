<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeDependentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_dependents', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('emp_number')->unsigned()->nullable();
            $table->foreign('emp_number')->references('emp_number')->on('employees')->onDelete('cascade');

            $table->decimal('ed_seqno')->nullable();
            $table->string('ed_name')->nullable();
            $table->string('ed_relationship_type')->nullable();
            $table->string('ed_relationship')->nullable();
            $table->string('ed_date_of_birth')->nullable();

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
        Schema::dropIfExists('employee_dependents');
    }
}
