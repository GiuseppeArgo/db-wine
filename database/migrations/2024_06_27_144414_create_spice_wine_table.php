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
        Schema::create('spice_wine', function (Blueprint $table) {
            $table->unsignedBigInteger('spice_id');
            $table->foreign('spice_id')->references('id')->on('spices')->cascadeOnDelete();

            $table->unsignedBigInteger('wine_id');
            $table->foreign('wine_id')->references('id')->on('wines')->cascadeOnDelete();

            $table->primary(['spice_id', 'wine_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spice_wine');
    }
};
