<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerformanceTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performance_tracks', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('emp_number')->unsigned()->nullable();
            $table->foreign('emp_number')->references('emp_number')->on('employees')->onDelete('cascade');

            $table->string('tracker_name')->nullable();
            $table->timestamp('added_date')->nullable();
            $table->integer('Organization_Code')->unsigned()->nullable();
            $table->foreign('Organization_Code')->references('id')->on('organization_gen_infos')->onDelete('cascade');

            $table->integer('status')->default(0)->nullable();
            $table->timestamp('modified_date')->nullable();

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
        Schema::dropIfExists('performance_tracks');
    }
}
