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
        Schema::table('test', function (Blueprint $table) {
            //
            $table->string('postcode')->nullable(); 
            $table->string('gender')->nullable(); 
            $table->json('hobbies')->nullable(); 
            $table->json('role')->nullable(); 
            $table->json('files')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('test', function (Blueprint $table) {
            //
            $table->dropColumn('postcode'); 
            $table->dropColumn('gender'); 
            $table->dropColumn('hobbies'); 
            $table->dropColumn('role'); 
            $table->dropColumn('files');
        });
    }
};
