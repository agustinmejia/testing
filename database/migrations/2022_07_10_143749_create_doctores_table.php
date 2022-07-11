<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('especialidad_id')->nullable()->constrained('especialidades');
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->foreignId('turno_id')->nullable()->constrained('turnos');
            $table->string('nombre_completo')->nullable();
            $table->string('ci')->nullable();
            $table->string('imagen')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('estado')->nullable()->default('disponible');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctores');
    }
}
