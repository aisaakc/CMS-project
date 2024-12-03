<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('preguntas', function (Blueprint $table) {
            $table->integer('idpregunta', true);
            $table->string('pregunta');
        });

        DB::table('preguntas')->insert([
            ['pregunta' => '¿Cuál es el nombre de tu primera mascota?'],
            ['pregunta' => '¿Cuál es el nombre de tu primer profesor(a)?'],
            ['pregunta' => '¿Cuál es el nombre de tu escuela primaria?'],
            ['pregunta' => '¿Cuál es el nombre de tu madre de soltera?'],
            ['pregunta' => '¿Cuál es tu película favorita?'],
        ]);
    }
    public function down(): void
    {
        Schema::dropIfExists('preguntas');
    }
};
