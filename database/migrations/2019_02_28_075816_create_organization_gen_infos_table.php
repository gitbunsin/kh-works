<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizationGenInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organization_gen_infos', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('role_id')->unsigned()->nullable();
            $table->foreign('role_id', 'S2kr3PKvDJUDHFFFAJOOJD9SDD5KNHiC0S0JWy3Ub1')->references('id')->on('roles')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('tax_id')->nullable();
            $table->string('registration_number')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('stree1')->nullable();
            $table->string('street2')->nullable();
            $table->string('note')->nullable();
            $table->string('password')->nullable();
            $table->string('remember_token')->nullable();
            $table->string('email')->nullable();
            $table->string('email_token')->nullable();
            $table->string('email_verified_at')->nullable();
            $table->string('verified')->default('0')->nullable();
            $table->text('postal_address')->nullable();
            $table->string('website')->nullable();
            $table->string('company_logo')->nullable();
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
        Schema::dropIfExists('organization_gen_infos');
    }
}
