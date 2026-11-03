<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vraag extends Model
{
    protected $table = 'vragen';

    protected $fillable = ['docent_id', 'tekst', 'optie_a', 'optie_b', 'optie_c', 'optie_d', 'goed_antwoord', 'uitleg', 'tijdslimiet_sec'];

    public function docent(): BelongsTo
    {
        return $this->belongsTo(User::class, 'docent_id');
    }

    public function categorieen(): BelongsToMany
    {
        return $this->belongsToMany(Categorie::class, 'categorie_vraag', 'vraag_id', 'categorie_id');
    }

    public function antwoorden(): HasMany
    {
        return $this->hasMany(Antwoord::class);
    }
}
