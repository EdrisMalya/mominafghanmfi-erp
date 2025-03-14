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
        Schema::create('customer_old_borrowings', function (Blueprint $table) {
            $table->id();
            $table->string('relation');
            $table->unsignedInteger('relation_id');
            $table->string('loan_reference');
            $table->string('name_of_the_lender');
            $table->string('address_of_the_lender');
            $table->string('for_how_long');
            $table->unsignedInteger('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_old_borrowings');
    }
};
