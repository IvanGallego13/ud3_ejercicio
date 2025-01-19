<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id(); // Clave primaria
            $table->foreignId('usuario_id')->constrained('alumnos')->onDelete('cascade'); // Relación con alumnos
            $table->string('titulo'); // Título del post
            $table->text('contenido'); // Contenido del post
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
}

