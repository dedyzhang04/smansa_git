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
        Schema::create('new_students', function (Blueprint $table) {
            $table->id();
            $table->string('nisn')->unique()->index();
            $table->string('name');
            $table->string('birth_place')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('class_recommendation')->nullable();
            
            // Document uploads
            $table->string('kk_path')->nullable();
            $table->string('akta_path')->nullable();
            $table->string('photo_path')->nullable();
            $table->string('spmb_path')->nullable();
            $table->string('statement_path')->nullable();
            
            $table->timestamp('uploaded_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('new_students');
    }
};
