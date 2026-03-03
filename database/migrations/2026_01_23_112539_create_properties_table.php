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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->decimal('price', 15, 2);
            $table->string('image')->nullable();
            $table->string('location');
            $table->integer('beds');
            $table->integer('baths');
            $table->integer('sq_ft');
            $table->string('home_type');
            $table->year('year_built');
            $table->decimal('price_sqft', 10, 2);
            $table->text('more_info')->nullable();
            $table->string('agent_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
