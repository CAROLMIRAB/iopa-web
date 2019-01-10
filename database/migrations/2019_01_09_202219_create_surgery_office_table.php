<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurgeryOfficeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surgery_office', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('surgery_id')->unsigned();
            $table->integer('office_id')->unsigned();

            $table->foreign('surgery_id')->references('id')->on('surgeries')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('office_id')->references('id')->on('offices')
            ->onDelete('cascade')
            ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surgery_office');
    }
}
