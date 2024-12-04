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
            $table->id('idnacionalidad', true);
            $table->string('nacionalidad', 45);
        });

        DB::table('nacionalidades')->insert([
            ['nacionalidad' => 'Venezolana'],
            ['nacionalidad' => 'Extranjero'],
        ]);

        Schema::create('preguntas', function (Blueprint $table) {
            $table->id('idpregunta', true);
            $table->string('pregunta', 450);
        });

        DB::table('preguntas')->insert([
            ['pregunta' => '¿Cuál es el nombre de tu primera mascota?'],
            ['pregunta' => '¿Cuál es el nombre de tu primer profesor(a)?'],
            ['pregunta' => '¿Cuál es el nombre de tu escuela primaria?'],
            ['pregunta' => '¿Cuál es el nombre de tu madre de soltera?'],
            ['pregunta' => '¿Cuál es tu película favorita?'],
        ]);



        Schema::create('users', function (Blueprint $table) {
            $table->id('idusers', true);
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
            $table->string('password', 255)->nullable();
            $table->foreignId('nacionalidad_idnacionalidad')
                ->constrained('nacionalidades', 'idnacionalidad') // Referencia a la tabla nacionalidades
                ->onDelete('cascade'); // Eliminar usuarios si se elimina la nacionalidad
        });


        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->text('payload');
            $table->integer('last_activity')->index();
        });



        Schema::create('password_resets', function (Blueprint $table) {
            $table->id(); // ID autoincremental
            $table->string('email')->index(); // Correo electrónico del usuario
            $table->string('token'); // Token para restablecimiento de contraseña
            $table->timestamp('created_at')->nullable(); // Fecha de creación del token
            $table->foreignId('user_id') // Llave foránea a la tabla users
                ->constrained('users', 'idusers') // Referencia a la tabla users
                ->onDelete('cascade'); // Eliminar entradas de password_resets si se elimina el usuario
        });

        Schema::create('respuestas', function (Blueprint $table) {
            $table->id('idrespuesta', true);
            $table->foreignId('user_id') // Llave foránea a la tabla users
                ->constrained('users', 'idusers')
                ->onDelete('cascade'); // Eliminar respuestas si se elimina el usuario
            $table->foreignId('pregunta_id') // Llave foránea a la tabla preguntas
                ->constrained('preguntas', 'idpregunta')
                ->onDelete('cascade'); // Eliminar respuestas si se elimina la pregunta
            $table->string('respuesta'); // Almacenar la respuesta del usuario a la pregunta
            $table->timestamps(); // Campos created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');

        Schema::dropIfExists('respuestas');

        Schema::dropIfExists('preguntas');

        Schema::dropIfExists('nacionalidades');

        Schema::dropIfExists('sessions');

        Schema::dropIfExists('password_resets');
    }
};
