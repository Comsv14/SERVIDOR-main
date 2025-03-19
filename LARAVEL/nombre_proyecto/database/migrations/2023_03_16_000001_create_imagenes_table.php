<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagenesTable extends Migration
{
    public function up()
    {
        Schema::create('imagenes', function (Blueprint $table) {
            $table->increments('idimagen');
            $table->string('categoria')->nullable();
            $table->string('imagen');
            $table->string('descripcion')->nullable();
            $table->timestamps(); // Si no usas created_at/updated_at, puedes quitar esto
        });
    }

    public function down()
    {
        Schema::dropIfExists('imagenes');
    }
}
