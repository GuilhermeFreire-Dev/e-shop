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
        Schema::create('skus', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->foreignId('product_id')->constrained(
                table: 'products',
                indexName: 'skus_product_id'
            )->cascadeOnDelete();
            $table->string('name', 30);
            $table->string('size', 10);
            $table->string('color', 20);
            $table->string('hex', 7)->default('#000000');
            $table->integer('tissue', 20);
            $table->double('last_price')->nullable();
            $table->double('current_price')->default(0);
            $table->integer('quantity')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skus');
    }
};
