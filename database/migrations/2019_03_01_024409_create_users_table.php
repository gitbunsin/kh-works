<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('company_id')->unsigned()->nullable();
            $table->foreign('company_id')->references('id')->on('organization_gen_infos')->onDelete('cascade');

            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->string('name')->nullable();
            $table->string('full_name')->nullable();
            $table->text('address')->nullable();
            $table->string('password')->nullable();
            $table->string('contact_number')->nullable();
            $table->integer('status')->nullable();
            $table->text('comment')->nullable();
            $table->string('remember_token')->nullable();
            $table->string('verified')->default('0')->comment('1 is verified & 0 in not verified');
            $table->string('email_token')->nullable();


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
        Schema::dropIfExists('users');
    }
}
