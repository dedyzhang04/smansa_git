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
            $table->string('gender')->nullable();
            $table->string('nik')->nullable();
            $table->string('religion')->nullable();
            $table->text('address')->nullable();
            $table->string('district')->nullable();
            $table->string('subdistrict')->nullable();
            $table->string('stay_type')->nullable();
            $table->string('phone')->nullable();
            $table->string('is_kps')->nullable();
            $table->string('kps_number')->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_education')->nullable();
            $table->string('father_job')->nullable();
            $table->string('father_income')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_education')->nullable();
            $table->string('mother_job')->nullable();
            $table->string('mother_income')->nullable();
            $table->text('parent_address')->nullable();
            $table->string('guardian_name')->nullable();
            $table->string('guardian_education')->nullable();
            $table->string('guardian_job')->nullable();
            $table->string('guardian_income')->nullable();
            $table->text('guardian_address')->nullable();
            $table->string('is_kip')->nullable();
            $table->string('kip_number')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('new_students', function (Blueprint $table) {
            $table->dropColumn([
                'gender', 'nik', 'religion', 'address', 'district', 'subdistrict', 'stay_type', 'phone',
                'is_kps', 'kps_number', 'father_name', 'father_education', 'father_job', 'father_income',
                'mother_name', 'mother_education', 'mother_job', 'mother_income', 'parent_address',
                'guardian_name', 'guardian_education', 'guardian_job', 'guardian_income', 'guardian_address',
                'is_kip', 'kip_number'
            ]);
        });
    }
};
