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
        Schema::create('request_step_fields', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('request_step_field_id')->nullable()->default(null);
            $table->unsignedInteger('finance_mode_request_step_id');
            $table->integer('order')->default(0);
            $table->string('field_name');
            $table->string('width');
            $table->json('field');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_step_fields');
    }
};
