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
        Schema::create('murabeha_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('province_id');
            $table->unsignedInteger('branch_id');
            $table->unsignedInteger('customer_id');
            $table->boolean('step_2_completed')->default(false);
            $table->boolean('step_3_completed')->default(false);
            $table->boolean('step_4_completed')->default(false);
            $table->boolean('step_5_completed')->default(false);
            $table->boolean('step_6_completed')->default(false);
            $table->boolean('step_7_completed')->default(false);
            $table->boolean('step_8_completed')->default(false);
            $table->boolean('step_9_completed')->default(false);
            $table->boolean('step_10_completed')->default(false);
            $table->string('status')->default('personal_information_creation');
            $table->unsignedInteger('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('murabeha_requests');
    }
};
