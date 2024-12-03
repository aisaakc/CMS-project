<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('preguntas', function (Blueprint $table) {
            $table->integer('idpregunta', true);
            $table->string('pregunta');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('preguntas');
    }
};
