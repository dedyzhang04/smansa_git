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
        Schema::table('new_students', function (Blueprint $table) {
            $table->string('verification_status')->default('pending');
            $table->text('verification_notes')->nullable();
            $table->text('admin_notes')->nullable();
            $table->string('verified_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('new_students', function (Blueprint $table) {
            $table->dropColumn(['verification_status', 'verification_notes', 'admin_notes', 'verified_by']);
        });
    }
};
