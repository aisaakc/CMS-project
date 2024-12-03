<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('nacionalidades', function (Blueprint $table) {
            $table->integer('idnacionalidad', true);
            $table->string('nacionalidad', 45);
        });

        Schema::create('preguntas', function (Blueprint $table) {
            $table->integer('idpregunta', true);
            $table->string('pregunta', 450);
        });

        Schema::create('respuestas', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('respuesta', 100);
            $table->integer('users_idusers');
            $table->integer('preguntas_idpreguntas');

            DB::table('preguntas')->insert([
                ['pregunta' => '¿Cuál es el nombre de tu primera mascota?'],
                ['pregunta' => '¿Cuál es el nombre de tu primer profesor(a)?'],
                ['pregunta' => '¿Cuál es el nombre de tu escuela primaria?'],
                ['pregunta' => '¿Cuál es el nombre de tu madre de soltera?'],
                ['pregunta' => '¿Cuál es tu película favorita?'],
            ]);
        });

        Schema::create('users', function (Blueprint $table) {
            $table->integer('idusers', true);
            $table->string('first_name', 45)->nullable();
            $table->string('last_name', 45)->nullable();
            $table->string('date_of_birth', 45)->nullable();
            $table->integer('cedula')->nullable();
            $table->string('address', 45)->nullable();
            $table->string('email', 45)->nullable();
            $table->string('facebook', 45)->nullable();
            $table->string('instagram', 45)->nullable();
            $table->string('x', 45)->nullable();
            $table->string('tiktok', 45)->nullable();
            $table->string('descripcion', 45)->nullable();
            $table->string('password', 45)->nullable();
            $table->integer('nacionalidad_idnacionalidad');
        });
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->text('payload');
            $table->integer('last_activity')->index();
        });

        DB::table('nacionalidades')->insert([
            ['nacionalidad' => 'Venezolana'],
            ['nacionalidad' => 'Extranjero'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');

        Schema::dropIfExists('respuestas');

        Schema::dropIfExists('preguntas');

        Schema::dropIfExists('nacionalidad');

        Schema::dropIfExists('sessions');
    }
};
