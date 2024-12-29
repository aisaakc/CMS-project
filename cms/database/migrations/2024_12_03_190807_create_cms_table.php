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
    // Crear tabla de roles
    Schema::create('roles', function (Blueprint $table) {
        $table->id('idroles');
        $table->string('name', 45);
    });

    DB::table('roles')->insert([
        ['name' => 'admin'],
        ['name' => 'publisher'],
    ]);

    // Crear tabla de nacionalidades
    Schema::create('nacionalidades', function (Blueprint $table) {
        $table->id('idnacionalidad');
        $table->string('nacionalidad', 45);
    });

    DB::table('nacionalidades')->insert([
        ['nacionalidad' => 'Venezolana'],
        ['nacionalidad' => 'Extranjero'],
    ]);

    // Crear tabla de preguntas
    Schema::create('preguntas', function (Blueprint $table) {
        $table->id('idpregunta');
        $table->string('pregunta', 450);
    });

    DB::table('preguntas')->insert([
        ['pregunta' => '¿Cuál es el nombre de tu primera mascota?'],
        ['pregunta' => '¿Cuál es el nombre de tu primer profesor(a)?'],
        ['pregunta' => '¿Cuál es el nombre de tu escuela primaria?'],
        ['pregunta' => '¿Cuál es el nombre de tu madre de soltera?'],
        ['pregunta' => '¿Cuál es tu película favorita?'],
    ]);

    // Crear tabla de usuarios antes de publications
    Schema::create('users', function (Blueprint $table) {
        $table->id('idusers'); // unsignedBigInteger por defecto
        $table->string('first_name', 45)->nullable();
        $table->string('last_name', 45)->nullable();
        $table->string('date_of_birth', 45)->nullable();
        $table->integer('cedula')->nullable()->unique();
        $table->string('user_name', 45)->nullable()->unique();
        $table->text('image')->nullable();
        $table->string('address', 45)->nullable();
        $table->string('email', 45)->nullable()->unique();
        $table->string('facebook', 45)->nullable();
        $table->string('instagram', 45)->nullable();
        $table->string('x', 45)->nullable();
        $table->string('tiktok', 45)->nullable();
        $table->text('descripcion')->nullable();
        $table->string('password', 255)->nullable();
        $table->foreignId('nacionalidad_idnacionalidad')
              ->constrained('nacionalidades', 'idnacionalidad')
              ->onDelete('cascade');
        $table->unsignedBigInteger('roles_idroles')->default(2);
        $table->foreign('roles_idroles')
              ->references('idroles')
              ->on('roles')
              ->onDelete('cascade');
    });

    DB::table('users')->insert([
        [
            'first_name' => 'Isaac',
            'last_name' => 'Cattoni',
            'date_of_birth' => '2003-31-12',
            'cedula' => 30551898,
            'user_name' => 'Admin',
            'email' => 'isaac.cattoni@gmail.com',
            'password' => bcrypt('password12345'),
            'nacionalidad_idnacionalidad' => 1,
            'roles_idroles' => 1,
        ],
    ]);

    Schema::create('publications', function (Blueprint $table) {
        $table->id('idpublications');
        $table->string('title', 45);
        $table->text('content');
        $table->text('image');
        $table->date('fecha_creacion');
        $table->date('fecha_publicacion');
        $table->text('categoria');
        $table->enum('estado', ['publicado', 'borrador', 'programado']);
        $table->foreignId('users_idusers')
              ->constrained('users', 'idusers')
              ->onDelete('cascade');
    });

    // Crear tabla de sesiones
    Schema::create('sessions', function (Blueprint $table) {
        $table->string('id')->primary();
        $table->foreignId('user_id')->nullable()->index();
        $table->string('ip_address', 45)->nullable();
        $table->text('user_agent')->nullable();
        $table->text('payload');
        $table->integer('last_activity')->index();
    });

    // Crear tabla de reseteo de contraseñas
    Schema::create('password_resets', function (Blueprint $table) {
        $table->id();
        $table->string('email')->index();
        $table->string('token');
        $table->timestamp('created_at')->nullable();
        $table->foreignId('user_id')
              ->constrained('users', 'idusers')
              ->onDelete('cascade');
    });

    // Crear tabla de respuestas
    Schema::create('respuestas', function (Blueprint $table) {
        $table->id('idrespuesta');
        $table->foreignId('users_idusers')
              ->constrained('users', 'idusers')
              ->onDelete('cascade');
        $table->foreignId('preguntas_idpreguntas')
              ->constrained('preguntas', 'idpregunta')
              ->onDelete('cascade');
        $table->string('respuesta');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publications');
        Schema::dropIfExists('respuestas');
        Schema::dropIfExists('password_resets');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('users');
        Schema::dropIfExists('preguntas');
        Schema::dropIfExists('nacionalidades');
        Schema::dropIfExists('roles');
    }
};
