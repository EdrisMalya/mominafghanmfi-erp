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
        Schema::create('customer_required_items', function (Blueprint $table) {
            $table->id();
            $table->string('relation');
            $table->unsignedInteger('relation_id');
            $table->string('item_name');
            $table->integer('quantity');
            $table->decimal('price_per_item', 12, 2);
            $table->enum('quality', ['High', 'Medium', 'Low']);
            $table->enum('has_supplier', ['Yes', 'No'])->default('No');
            $table->string('supplier_name')->nullable();
            $table->string('supplier_address')->nullable();
            $table->string('supplier_contact_number')->nullable();
            $table->string('supplier_email')->nullable();
            $table->decimal('total_price');
            $table->unsignedInteger('supplier_document_id')->nullable();
            $table->unsignedInteger('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_required_items');
    }
};
