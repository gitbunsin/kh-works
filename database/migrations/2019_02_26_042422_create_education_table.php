<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned()->nullable();
            $table->foreign('company_id', 'S2kr3PKvDDDFJKJliih3sJDLKOSI9SDD5KNHiC0S0JWy3Ub1')->references('id')->on('organization_gen_infos')->onDelete('cascade');

            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->integer('is_deleted')->unsigend()->nullable()->comment("1 is active  and 0 not active.");

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
        Schema::dropIfExists('education');
    }
}
