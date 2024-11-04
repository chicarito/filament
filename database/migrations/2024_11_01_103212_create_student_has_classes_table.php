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
        Schema::create('student_has_classes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->cascadeOnUpdate()->cascadeOnUpdate();
            $table->foreignId('home_room_id')->constrained()->cascadeOnUpdate()->cascadeOnUpdate();
            $table->foreignId('periode_id')->constrained()->cascadeOnUpdate()->cascadeOnUpdate();
            $table->foreignId('is_open')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_has_classes');
    }
};
