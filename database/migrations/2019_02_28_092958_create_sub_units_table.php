<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_units', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned()->nullable();
            $table->foreign('company_id')->references('id')->on('organization_gen_infos')->onDelete('cascade');

            $table->string('name')->nullable();
            $table->string('title')->nullable();
            $table->integer('parent_id')->nullable();
            $table->string('unit_id')->nullable();
            $table->string('description')->nullable();
            $table->smallInteger('lft')->nullable();
            $table->smallInteger('rgt')->nullable();
            $table->smallInteger('level')->nullable();

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
        Schema::dropIfExists('sub_units');
    }
}
