<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre'); // nombre varchar del estudiante
            $table->string('apellido'); // apellido varchar del estudiante
            $table->string('email')->unique(); // email campo varchar único
            $table->foreignId('carrera_id')->constrained()->cascadeOnDelete(); 
            // llave foránea a la tabla de carrera
            $table->boolean('estatus')->default(true); // estado booleano del estudiante
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
        Schema::dropIfExists('estudiantes');
    }
}
