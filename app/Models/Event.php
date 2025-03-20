<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
        'location',
        'image_path',
        'is_featured',
        'user_id'
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'is_featured' => 'boolean'
    ];

     // Get upcoming events
     public function scopeUpcoming($query)
     {
         return $query->where('start_date', '>=', now())->orderBy('start_date', 'asc');
     }
     
     // Get featured events
     public function scopeFeatured($query)
     {
         return $query->where('is_featured', true);
     }
    
}
