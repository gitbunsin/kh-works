<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobSpecificationAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_specification_attachments', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('job_titles_id')->unsigned()->nullable();
            $table->foreign('job_titles_id')->references('id')->on('job_title')->onDelete('cascade');

            $table->string('file_name')->nullable();
            $table->string('file_type')->nullable();
            $table->string('file_size')->nullable();
            $table->string('file_content')->nullable();
            $table->integer('attachment_type')->nullable();


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
        Schema::dropIfExists('job_specification_attachments');
    }
}
