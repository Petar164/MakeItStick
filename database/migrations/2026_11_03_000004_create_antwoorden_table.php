<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('antwoorden', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('vraag_id')->constrained('vragen')->cascadeOnDelete();
            $table->char('gekozen', 1)->nullable(); // leeg = te laat
            $table->boolean('goed');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('antwoorden');
    }
};
