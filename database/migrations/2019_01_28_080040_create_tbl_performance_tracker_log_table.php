<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblPerformanceTrackerLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_performance_tracker_log', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id');
            $table->integer('performance_track_id');
            $table->string('log');
            $table->string('comment');
            $table->integer('status');
            $table->timestamp('added_date');
            $table->timestamp('modified_date');
            $table->integer('review_id');
            $table->string('achievement');
            $table->integer('user_id');
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
        Schema::dropIfExists('tbl_performance_tracker_log');
    }
}
