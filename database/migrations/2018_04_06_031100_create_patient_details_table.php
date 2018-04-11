<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('patient_details', function (Blueprint $table) {
        //   $table->increments('id');
        //   $table->string('medicare_no');
        //   $table->string('name');
        //   $table->longtext('details');
        //   $table->unsignedInteger('doctor_id');
        //   $table->string('report_file_path');
        //   $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('patient_details');
    }
}
