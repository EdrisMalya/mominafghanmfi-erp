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
        Schema::create('finance_mode_request_steps', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('financing_mode_id');
            $table->string('step_name');
            $table->boolean('required')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('finance_mode_request_steps');
    }
};
