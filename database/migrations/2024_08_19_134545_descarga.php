<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('descargas', function (Blueprint $table) {
            $table->id();
            $table->integer('unidade');
            $table->unsignedBigInteger('placa_id');
            $table->foreign('placa_id')->references('id')->on('placas')->onDelete('cascade');
            $table->time('hora_inicio');
            $table->time('hora_fim');
            $table->date('data');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
