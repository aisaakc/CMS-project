<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('respuestas', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('users_idusers');
            $table->integer('preguntas_idpreguntas');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('respuestas');
    }
};
