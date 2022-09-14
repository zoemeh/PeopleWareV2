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
        Schema::create('competencias_personas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('persona_id')->constrained('personas')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('competencia_id')->constrained('competencias')
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
        Schema::dropIfExists('competencias_personas');
    }
};
