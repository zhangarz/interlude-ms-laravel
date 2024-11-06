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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('name_ku');
            $table->string('desc_ar');
            $table->string('desc_en');
            $table->string('desc_ku');
            $table->foreignId('shop_id')->on('shops')->cascadeOnDelete()->cascadeOnUpdate()->nullable();
            $table->foreignId('category_id')->on('categories')->cascadeOnDelete()->cascadeOnUpdate()->nullable();
            $table->foreignId('brand')->on('categories')->nullable();
            $table->string('price');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
