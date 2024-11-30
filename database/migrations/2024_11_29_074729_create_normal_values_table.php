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
        Schema::create('normal_values', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('measure_id');
            $table->foreign('measure_id')->references('id')->on('measures');
            $table->string('age_from'); 
            $table->string('age_to')->nullable(); 
            $table->string('min_value')->nullable();
            $table->string('max_value')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('normal_values');
    }
};
