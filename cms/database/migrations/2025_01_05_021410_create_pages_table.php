<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string('slug')->unique();
            $table->string('status')->default('draft'); // 'draft', 'published', 'archived'
            $table->timestamps();
            // Valor predeterminado para users_idusers
            $table->foreignId('users_idusers')->default(1)  // Aquí puedes poner el ID de un usuario predeterminado, si lo deseas
                ->constrained('users', 'idusers')
                ->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
