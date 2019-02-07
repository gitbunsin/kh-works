<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblAttendanceRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_hr_attendance_record', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id');
            $table->dateTime('punch_in_utc_time');
            $table->string('punch_in_note');
            $table->string('punch_in_time_offset');
            $table->dateTime('punch_in_user_time');
            $table->dateTime('punch_out_utc_time');
            $table->string('punch_out_note');
            $table->string('punch_out_time_offset');
            $table->dateTime('punch_out_user_time');
            $table->string('status');
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
        Schema::dropIfExists('tbl_attendance_record');
    }
}
