<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
 
    public function up(): void
    {
        Schema::create('nacionalidades', function (Blueprint $table) {
            $table->integer('idnacionalidad', true);
            $table->string('nacionalidad');
        });

        DB::table('nacionalidades')->insert([
            ['nacionalidad' => 'Venezolana'],
            ['nacionalidad' => 'Extranjero'],
        ]);
       
    }

    public function down(): void
    {
        Schema::dropIfExists('nacionalidad');
    }
};
