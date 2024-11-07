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
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('name_ku');
            $table->foreignId('user_id')->on('users')->cascadeOnDelete()->cascadeOnUpdate()->nullable();
            $table->text('desc_ar')->nullable();
            $table->text('desc_en')->nullable();
            $table->text('desc_ku')->nullable();
            $table->text('address_ar')->nullable();
            $table->text('address_en')->nullable();
            $table->text('address_ku')->nullable();
            $table->string('logo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shops');
    }
};
