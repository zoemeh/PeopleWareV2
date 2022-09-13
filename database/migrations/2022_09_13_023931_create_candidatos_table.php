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
        Schema::create('candidatos', function (Blueprint $table) {
            $table->id();
            $table->string("cedula");
            $table->string("nombre");
            $table->foreignId('puesto_id')->constrained('puestos')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->double('salario_deseado', 8, 2);
            $table->string('recomendado_por');
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
        Schema::dropIfExists('candidatos');
    }
};
