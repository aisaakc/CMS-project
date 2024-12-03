<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('idusers', true);
            $table->string('first_name');
            $table->string('last_name');
            $table->string('date_of_birth');
            $table->integer('cedula')->unique();
            $table->string('address');
            $table->string('email')->unique();
            $table->string('facebook');
            $table->string('instagram');
            $table->string('x');
            $table->string('tiktok');
            $table->string('descripcion');
            $table->string('password');
            $table->integer('nacionalidad_idnacionalidad');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
