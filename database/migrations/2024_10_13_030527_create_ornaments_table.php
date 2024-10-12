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
        Schema::create('ornaments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('ring')->nullable();
            $table->string('topleft')->nullable();
            $table->string('topright')->nullable();
            $table->string('bottomleft')->nullable();
            $table->string('bottomright')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ornaments');
    }
};
