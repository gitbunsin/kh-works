<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_user_employee', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('emp_id');
            $table->integer('company_id');
            $table->integer('role_id');
            $table->string('email');
            $table->string('password');
            $table->string('email_token');
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
        Schema::dropIfExists('user_employee');
    }
}
