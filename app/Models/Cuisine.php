<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cuisine extends Model
{
    protected $fillable = [
        'name',
        'description',
        'region'
    ];

    //Relation to Recipe 
    public function Recipe():HasMany{
        return $this->hasMany(Recipe::class);
    }
}
