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
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->integer('cedula')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('x')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('password')->nullable();
            $table->integer('nacionalidad_idnacionalidad');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
