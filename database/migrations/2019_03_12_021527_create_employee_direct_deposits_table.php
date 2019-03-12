<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeDirectDepositsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_direct_deposits', function (Blueprint $table) {
            $table->increments('id');


            $table->integer('salary_id')->unsigned()->nullable();
            $table->foreign('salary_id')->references('id')->on('employee_basic_salaries')->onDelete('cascade');


            $table->integer('dd_routing_num')->nullable();
            $table->string('dd_account')->nullable();
            $table->decimal('dd_amount')->nullable();
            $table->string('dd_account_type')->nullable();
            $table->string('dd_transaction_type')->nullable();

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
        Schema::dropIfExists('employee_direct_deposits');
    }
}
