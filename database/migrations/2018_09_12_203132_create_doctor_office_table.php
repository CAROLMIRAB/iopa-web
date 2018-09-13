<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorOfficeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_office', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('doctor_id')->unsigned();
            $table->integer('office_id')->unsigned();

            $table->foreign('doctor_id')->references('id')->on('doctors')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('office_id')->references('id')->on('offices')
            ->onDelete('cascade')
            ->onUpdate('cascade');

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
        Schema::dropIfExists('doctor_office');
    }
}
