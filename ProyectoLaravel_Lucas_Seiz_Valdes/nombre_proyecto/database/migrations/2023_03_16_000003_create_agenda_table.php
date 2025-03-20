<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendaTable extends Migration
{
    public function up()
    {
        Schema::create('agenda', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->time('hora');
            $table->unsignedInteger('idpersona');
            $table->unsignedInteger('idimagen');

            // Claves foráneas
            $table->foreign('idpersona')->references('id')->on('personas');
            $table->foreign('idimagen')->references('idimagen')->on('imagenes');

            // Si deseas timestamps
            // $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('agenda');
    }
}
