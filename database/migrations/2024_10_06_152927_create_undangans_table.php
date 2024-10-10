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
        Schema::create('undangans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->index();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('tema_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('kategori_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('paket_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('ayat_id')->nullable()->constrained()->nullOnDelete();
            $table->boolean('shared')->default(false);
            $table->boolean('paid')->default(false);
            $table->date('event_date');
            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('undangans');
    }
};
