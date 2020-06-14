<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_appointments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('doctorId')->unsigned();
            $table->bigInteger('patientId')->unsigned();
            $table->string('appointmentDate');
            $table->bigInteger('slotId')->unsigned();
            $table->foreign('doctorId')->references('id')->on('users');
            $table->foreign('patientId')->references('id')->on('users');
            $table->foreign('slotId')->references('id')->on('slots');

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
        Schema::dropIfExists('book_appointments');
    }
}
