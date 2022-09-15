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
        Schema::create('capacitaciones', function (Blueprint $table) {
            $table->id();
            $table->string("descripcion");
            $table->enum('nivel', ['grado', 'postgrado', 'doctorado', 'tecnico', 'gestion']);
            $table->date("desde");
            $table->date("hasta")->nullable();
            $table->string("institucion");
            $table->foreignId('persona_id')->constrained('personas')
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
        Schema::dropIfExists('capacitaciones');
    }
};
