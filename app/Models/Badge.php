<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Badge extends Model
{
    protected $table = 'badges';

    protected $fillable = ['naam', 'voorwaarde'];

    public function studenten(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->withPivot('behaald_op');
    }
}
