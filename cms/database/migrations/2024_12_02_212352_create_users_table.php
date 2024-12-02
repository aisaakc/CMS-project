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
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
