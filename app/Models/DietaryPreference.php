<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DietaryPreference extends Model
{
    protected $fillable = [
        'name',
        'description'
    ];

    public function recipes()
    {
        return $this->belongsToMany(Recipe::class, 'recipe_dietary_preferences');
    }

}
