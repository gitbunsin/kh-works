<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public function up()
    {
        Schema::create('job_candidates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id');
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('contact_number')->nullable();
            $table->integer('status')->unsigned()->nullable();
            $table->text('comment')->nullable();
            $table->integer('mode_of_application')->unsigned()->nullable();
            $table->date('date_of_application')->nullable();
            $table->integer('cv_file_id')->unsigned()->nullable();
            $table->text('cv_text_version')->nullable();
            $table->string('keywords')->nullable();
            $table->integer('added_person')->unsigned()->nullable();
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
        Schema::dropIfExists('job_candidates');
    }
}
