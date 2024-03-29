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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 60);
            $table->text('description');
            $table->integer('brand_id');
            $table->foreignId('brand_id')->constrained(
                table: 'brands',
                indexName: 'product_brand_id',
            );
            $table->integer('category_id');
            $table->foreignId('category_id')->constrained(
                table: 'categories',
                indexName: 'product_category_id',
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
