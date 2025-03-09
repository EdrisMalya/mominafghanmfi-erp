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
        Schema::create('financing_modes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->boolean('default_mode')->default(false);
            $table->boolean('status');
            $table->unsignedInteger('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financing_modes');
    }
};
