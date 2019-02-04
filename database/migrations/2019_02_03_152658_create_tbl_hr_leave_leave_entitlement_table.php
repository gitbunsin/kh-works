<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblHrLeaveLeaveEntitlementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_hr_leave_leave_entitlement', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('leave_id');
            $table->integer('entitlement_id');
            $table->decimal('length_days');
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
        Schema::dropIfExists('tbl_hr_leave_leave_entitlement');
    }
}
