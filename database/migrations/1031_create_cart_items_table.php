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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->integer('cart_id');
            $table->foreignId('cart_id')->constrained(
                table: 'carts',
                indexName: 'item_cart_id'
            )->cascadeOnDelete();
            $table->integer('sku');
            $table->foreignId('sku')->constrained(
                table: 'skus',
                indexName: 'sku_cart_id'
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
