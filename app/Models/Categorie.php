<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categorie extends Model
{
    protected $table = 'categorieen';

    protected $fillable = ['naam'];

    public function vragen(): BelongsToMany
    {
        return $this->belongsToMany(Vraag::class, 'categorie_vraag', 'categorie_id', 'vraag_id');
    }
}
