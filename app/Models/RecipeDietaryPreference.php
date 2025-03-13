<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecipeDietaryPreference extends Model
{
    protected $fillable = ['recipe_id', 'dietary_preference_id'];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }

    public function dietaryPreference()
    {
        return $this->belongsTo(DietaryPreference::class);
    }
}
