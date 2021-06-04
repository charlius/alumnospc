<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsigncionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asigncions', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->string('asignacion');
            $table->unsignedBigInteger('id_alumnos');
            $table->string('producto');
            $table->string('marca');
            $table->unsignedBigInteger('id_apoderados');
            $table->timestamp('updated_at');
            $table->timestamp('created_at');            
            $table->foreign('id_alumnos')->references('id')->on('alumnos');
            $table->foreign('id_apoderados')->references('id')->on('apoderados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asigncions');
    }
}
