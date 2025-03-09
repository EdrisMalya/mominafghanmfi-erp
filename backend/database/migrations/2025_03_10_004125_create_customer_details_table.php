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
        Schema::create('customer_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('customer_id');
            $table->string('financing_mode');
            $table->unsignedInteger('financing_mode_request_id');
            $table->unsignedInteger('age');
            $table->string('phone_number');
            $table->string('second_phone_number')->nullable();
            $table->string('current_job');

            // Customer income
            $table->decimal('personally_monthly_income');
            $table->decimal('family_monthly_income');
            $table->decimal('other_income');

            // Current address information
            $table->unsignedInteger('province_id');
            $table->string('district');
            $table->string('village');
            $table->enum('nature_of_residence', ['Owner', 'Rental', 'Mortgaged']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_details');
    }
};
