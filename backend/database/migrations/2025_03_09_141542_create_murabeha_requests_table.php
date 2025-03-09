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
