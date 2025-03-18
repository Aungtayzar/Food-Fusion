<?php

namespace App\Http\Controllers;

use App\Models\EducationalResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EducationalResourceController extends Controller
{
    public function index()
    {
        $featuredResources = EducationalResource::where('featured', true)
            ->latest()
            ->take(3)
            ->get();
            
        $resources = EducationalResource::latest()->paginate(12);
        
        return view('educational-resources.index', compact('featuredResources', 'resources'));
    }
    
    public function download(EducationalResource $resource)
    {
        // Increment download count
        $resource->increment('download_count');
        
        // Return file download
        return response()->download(storage_path('app/public/' . $resource->file_path));
    }
    
    public function view(EducationalResource $resource)
    {
        // For infographics
        $resource->increment('download_count');
        $relatedResources = EducationalResource::where('id', '!=', $resource->id)
        ->where(function($query) use ($resource) {
            $query->where('type', $resource->type)
                  ->orWhere('featured', true);
        })->latest()->take(3)->get();
        return view('educational-resources.view', compact('resource','relatedResources'));
    }
    
    public function watch(EducationalResource $resource)
    {
        // For videos
        $resource->increment('download_count');
         // Get related videos
    $relatedVideos = EducationalResource::where('id', '!=', $resource->id)->where('type', 'video')->latest()->take(4)->get();
        return view('educational-resources.watch', compact('resource','relatedVideos'));
    }
}
