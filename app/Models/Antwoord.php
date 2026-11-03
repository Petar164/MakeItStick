<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Antwoord extends Model
{
    protected $table = 'antwoorden';

    protected $fillable = ['user_id', 'vraag_id', 'gekozen', 'goed'];

    protected $casts = ['goed' => 'boolean'];

    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function vraag(): BelongsTo
    {
        return $this->belongsTo(Vraag::class);
    }
}
