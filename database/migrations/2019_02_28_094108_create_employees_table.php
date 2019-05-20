<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('emp_number');

            $table->integer('company_id')->unsigned()->nullable();
            $table->foreign('company_id', 'S2kr3PKvDDDFJKJUDHFFliih3sJDLKOSI9SDD5KNHiC0S0JWy3Ub1')->references('id')->on('organization_gen_infos')->onDelete('cascade');

            $table->integer('employee_id')->unsigend()->nullable();
            $table->string('emp_lastname')->nullable();
            $table->string('emp_firstname')->nullable();
            $table->string('emp_middle_name')->nullable();
            $table->string('emp_nick_name')->nullable();
            $table->string('emp_smoker')->nullable();
            $table->string('ethnic_race_code')->nullable();
            $table->date('emp_birthday')->nullable();

            $table->integer('nation_code')->unsigned()->nullable();
            $table->foreign('nation_code')->references('id')->on('nationalities')->onDelete('cascade');

            $table->integer('emp_gender')->unsigend()->nullable();
            $table->string('emp_marital_status')->nullable();
            $table->string('emp_ssn_num')->nullable();
            $table->string('emp_sin_num')->nullable();
            $table->string('emp_other_id')->nullable();
            $table->string('emp_dri_lice_num')->nullable();
            $table->date('emp_dri_lice_exp_date')->nullable();
            $table->string('emp_military_service')->nullable();

            $table->integer('emp_status')->unsigned()->nullable();
            $table->foreign('emp_status')->references('id')->on('employment_statuses')->onDelete('cascade');


            $table->integer('job_titles_code')->unsigned()->nullable();
            $table->foreign('job_titles_code')->references('id')->on('job_title')->onDelete('cascade');


            $table->integer('eeo_cat_code')->unsigned()->nullable();
            $table->foreign('eeo_cat_code')->references('id')->on('job_categories')->onDelete('cascade');


            $table->integer('work_station')->unsigend()->nullable();
            $table->string('emp_street1')->nullable();
            $table->string('emp_street2')->nullable();
            $table->string('city_code')->nullable();
            $table->string('coun_code')->nullable();
            $table->string('provin_code')->nullable();
            $table->string('emp_zipcode')->nullable();
            $table->string('emp_hm_telephone')->nullable();
            $table->string('emp_mobile')->nullable();
            $table->string('emp_work_telephone')->nullable();
            $table->string('emp_work_email')->nullable();
            $table->string('sal_grd_code')->nullable();
            $table->date('joined_date')->nullable();
            $table->string('emp_oth_email')->nullable();



            $table->integer('termination_id')->unsigned()->nullable();
            $table->foreign('termination_id')->references('id')->on('termination_reasons')->onDelete('cascade');


            $table->string('profile_id')->nullable();
            $table->string('custom2')->nullable();
            $table->string('custom3')->nullable();
            $table->string('custom4')->nullable();
            $table->string('custom5')->nullable();
            $table->string('custom6')->nullable();
            $table->string('custom7')->nullable();
            $table->string('custom8')->nullable();
            $table->string('custom9')->nullable();
            $table->string('custom10')->nullable();
            $table->timestamps();
//            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
