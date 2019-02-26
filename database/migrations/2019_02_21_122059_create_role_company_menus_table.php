<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleCompanyMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_company_menus', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('company_id')->unsigned()->nullable();
            $table->foreign('company_id', 'S2kr3PKHGKjHHgLKHvA9D5KNHiCuLH0SavVqWy3Ub1')->references('id')->on('organization_gen_infos')->onDelete('cascade');

            $table->integer('menu_id')->unsigned()->nullable();
            $table->foreign('menu_id', 'S2kr3PKvA9D5KNHiDFuLH0S0JWy3Ub1')->references('id')->on('menus')->onDelete('cascade');
            $table->integer("is_active")->comment("1 is active menu and 0 not active.");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_company_menus');
    }
}
