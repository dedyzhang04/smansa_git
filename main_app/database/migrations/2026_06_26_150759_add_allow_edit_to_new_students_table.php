<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('new_students', function (Blueprint $table) {
            $table->boolean('allow_edit')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('new_students', function (Blueprint $table) {
            $table->dropColumn('allow_edit');
        });
    }
};
