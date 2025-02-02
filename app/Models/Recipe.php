<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Recipe extends Model
{
    protected $fillable = [
        'image',
        'title',
        'description',
        'ingredients',
        'instructions',
        'preparation_time',
        'cooking_time',
        'difficulty_level',
        'user_id',
        'cuisine_id'
    ];

    //Relation to user 
    public function User():BelongsTo{
        return $this->belongsTo(User::class);
    } 

    //Relation to Cuisine
    public function Cuisine():BelongsTo{
        return $this->belongsTo(Cuisine::class);
    }


}
