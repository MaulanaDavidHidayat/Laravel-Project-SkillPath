<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lesson extends Model
{
    protected $fillable = [
        'skill_id',
        'title',
        'slug',
        'description',
        'content',
        'order',
        'duration',
        'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    public function skill(): BelongsTo
    {
        return $this->belongsTo(Skill::class);
    }

    public function progresses(): HasMany
    {
        return $this->hasMany(UserProgress::class);
    }
}