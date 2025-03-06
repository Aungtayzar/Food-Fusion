<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Recipe extends Model
{
    protected $fillable = [
        'title',
        'description',
        'ingredients',
        'instructions',
        'cooking_tips',
        'personal_notes',
        'preparation_time',
        'cooking_time',
        'difficulty_level',
        'cuisine_id',
        'user_id',
        'image'
    ];

    //Relation to user 
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    } 

    //Relation to Cuisine
    public function cuisine(): BelongsTo
    {
        return $this->belongsTo(Cuisine::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(RecipeComment::class);
    }

    public function favorites(): HasMany
    {
        return $this->hasMany(RecipeFavorite::class);
    }

    public function isFavoritedByUser($userId)
    {
        return $this->favorites()->where('user_id', $userId)->exists();
    }
}
