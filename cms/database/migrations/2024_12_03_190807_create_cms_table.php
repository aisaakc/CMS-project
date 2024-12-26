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
        Schema::create('roles', function (Blueprint $table) {
            $table->id('idroles');
            $table->string('rol', 45);
        });

        DB::table('roles')->insert([
            ['rol' => 'admin'],
            ['rol' => 'publisher'],
        ]);

        Schema::create('nacionalidades', function (Blueprint $table) {
            $table->id('idnacionalidad');
            $table->string('nacionalidad', 45);
        });

        DB::table('nacionalidades')->insert([
            ['nacionalidad' => 'Venezolana'],
            ['nacionalidad' => 'Extranjero'],
        ]);

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

        Schema::create('users', function (Blueprint $table) {
            $table->id('idusers');
            $table->string('first_name', 45)->nullable();
            $table->string('last_name', 45)->nullable();
            $table->string('date_of_birth', 45)->nullable();
            $table->integer('cedula')->nullable()->unique();
            $table->text('image', 45)->nullable();
            $table->string('address', 45)->nullable();
            $table->string('email', 45)->nullable()->unique();
            $table->string('facebook', 45)->nullable();
            $table->string('instagram', 45)->nullable();
            $table->string('x', 45)->nullable();
            $table->string('tiktok', 45)->nullable();
            $table->text('descripcion', 45)->nullable();
            $table->string('password', 255)->nullable();
            $table->foreignId('nacionalidad_idnacionalidad')
                ->constrained('nacionalidades', 'idnacionalidad')
                ->onDelete('cascade');
            $table->unsignedBigInteger('roles_idroles'); // Define roles_idroles como unsignedBigInteger
            $table->foreign('roles_idroles') // Clave foránea explícita
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
                'address' => 'Calle Ficticia 123, Ciudad Ejemplo',
                'email' => 'isaac.cattoni@gmail.com',
                'descripcion' => 'Soy un desarrollador web con experiencia en Laravel y PHP.',
                'password' => bcrypt('password12345'),
                'nacionalidad_idnacionalidad' => 1,
                'roles_idroles' => 1,
            ],
        ]);

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->text('payload');
            $table->integer('last_activity')->index();
        });

        Schema::create('password_resets', function (Blueprint $table) {
            $table->id();
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
            $table->foreignId('user_id')
                ->constrained('users', 'idusers')
                ->onDelete('cascade');
        });

        Schema::create('respuestas', function (Blueprint $table) {
            $table->id('idrespuesta');
            $table->foreignId('users_idusers')
                ->constrained('users', 'idusers')
                ->onDelete('cascade');
            $table->foreignId('preguntas_idpreguntas')
                ->constrained('preguntas', 'idpregunta')
                ->onDelete('cascade');
            $table->string('respuesta');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('respuestas');
        Schema::dropIfExists('password_resets');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('users');
        Schema::dropIfExists('preguntas');
        Schema::dropIfExists('nacionalidades');
        Schema::dropIfExists('roles');
    }
};
