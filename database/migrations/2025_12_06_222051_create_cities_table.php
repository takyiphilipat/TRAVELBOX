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
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image')->nullable();
            $table->integer('num_days')->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->text('description')->nullable();

            // Only ONE country_id
            $table->unsignedBigInteger('country_id');

            // Add foreign key
            $table->foreign('country_id')
                  ->references('id')->on('countries')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
