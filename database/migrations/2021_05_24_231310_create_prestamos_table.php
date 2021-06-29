<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_apoderados');
            $table->unsignedBigInteger('id_alumnos');
            $table->string('marca');
            $table->string('s_n');
            $table->string('datalle');
            $table->string('comentario');
            $table->string('estado');
            $table->timestamp('updated_at');
            $table->timestamp('created_at');
            $table->foreign('id_apoderados')->references('id')->on('apoderados');
            $table->foreign('id_alumnos')->references('id')->on('alumnos');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prestamos');
    }
}
