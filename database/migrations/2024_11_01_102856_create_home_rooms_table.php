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
        Schema::create('home_rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('classroom_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('periode_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->boolean('is_open')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_rooms');
    }
};
