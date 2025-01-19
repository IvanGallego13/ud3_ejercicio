<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerfilTable extends Migration
{
    public function up()
    {
        Schema::create('perfil', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')->constrained('alumnos')->onDelete('cascade');
            $table->text('biografia')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('perfil');
    }
}

