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
        Schema::create('pengantins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('undangan_id')->constrained()->cascadeOnDelete();
            $table->enum('gender', ['pria', 'wanita']);
            $table->string('name');
            $table->string('father');
            $table->string('mother');
            $table->string('child');
            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengantins');
    }
};
