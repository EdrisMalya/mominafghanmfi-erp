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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('province_id');
            $table->unsignedInteger('branch_id');
            $table->unsignedInteger('created_by');
            $table->string('employee_id');
            $table->string('phone_number');
            $table->string('alternative_phone_number');
            $table->string('a_p_n_relationship');
            $table->string('nic_number');
            $table->string('current_address');
            $table->string('permanent_address');
            $table->string('job_title');
            $table->string('dob');
            $table->string('joining_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};
