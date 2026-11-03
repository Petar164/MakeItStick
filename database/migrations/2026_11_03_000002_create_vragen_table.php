<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vragen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('docent_id')->constrained('users')->cascadeOnDelete();
            $table->text('tekst');
            $table->string('optie_a');
            $table->string('optie_b');
            $table->string('optie_c');
            $table->string('optie_d');
            $table->char('goed_antwoord', 1); // a, b, c of d
            $table->text('uitleg')->nullable();
            $table->integer('tijdslimiet_sec')->default(15);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vragen');
    }
};
