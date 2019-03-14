<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('Organization_Code')->unsigned()->nullable();
            $table->foreign('Organization_Code')->references('id')->on('organization_gen_infos')->onDelete('cascade');

            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->tinyInteger('is_deleted')->default(0)->nullable();
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
        Schema::dropIfExists('customers');
    }
}
