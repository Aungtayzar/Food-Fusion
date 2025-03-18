<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationalResource extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'type',
        'file_path',
        'thumbnail',
        'video_url',
        'image_path',
        'featured',
        'download_count',
        'file_size',
        'file_format'
    ];

    public function getResourceUrlAttribute()
    {
        if ($this->type === 'video') {
            return $this->video_url;
        } elseif ($this->type === 'infographic') {
            return asset('storage/' . $this->image_path);
        } else {
            return asset('storage/' . $this->file_path);
        }
    }
}
