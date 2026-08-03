<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('verification_schedules', function (Blueprint $table) {
            $table->string('location')->nullable()->after('time');
        });
    }

    public function down(): void
    {
        Schema::table('verification_schedules', function (Blueprint $table) {
            $table->dropColumn('location');
        });
    }
};
