<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'added_by', 'username');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'post_id', 'post_id')->orderBy('id', 'desc');
    }
}
