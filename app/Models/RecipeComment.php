<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RecipeComment extends Model
{
    protected $fillable = ['content', 'recipe_id', 'user_id'];

    public function recipe(): BelongsTo
    {
        return $this->belongsTo(Recipe::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
