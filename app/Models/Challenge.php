<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Challenge extends Model
{
    protected $table = 'challenges';

    protected $fillable = ['docent_id', 'titel', 'opdracht', 'beoordelingscriteria', 'deadline'];

    protected $casts = ['deadline' => 'datetime'];

    public function docent(): BelongsTo
    {
        return $this->belongsTo(User::class, 'docent_id');
    }

    public function inzendingen(): HasMany
    {
        return $this->hasMany(Inzending::class);
    }
}
