<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puestos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->enum('riesgo', ['bajo', 'medio', 'alto']);
            $table->double('salario_minimo', 8, 2);
            $table->double('salario_maximo', 8, 2);
            $table->boolean('activo');
            $table->foreignId('departamento_id')->constrained('departamentos')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('empleado_id')->unique()->nullable()->constrained('empleados')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('puestos');
    }
};
