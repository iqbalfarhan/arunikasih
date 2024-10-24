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
        Schema::create('hadiahs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('undangan_id')->constrained()->cascadeOnDelete();
            $table->enum('type', ['rekening', 'alamat'])->default('rekening');
            $table->foreignId('bank_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('pic')->nullable();
            $table->string('value')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hadiahs');
    }
};
