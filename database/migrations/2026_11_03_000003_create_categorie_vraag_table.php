<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // koppeltabel: een vraag kan bij meerdere categorieen horen (N-op-N)
        Schema::create('categorie_vraag', function (Blueprint $table) {
            $table->foreignId('vraag_id')->constrained('vragen')->cascadeOnDelete();
            $table->foreignId('categorie_id')->constrained('categorieen')->cascadeOnDelete();
            $table->primary(['vraag_id', 'categorie_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categorie_vraag');
    }
};
