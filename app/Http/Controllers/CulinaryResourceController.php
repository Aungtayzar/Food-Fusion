<?php

namespace App\Http\Controllers;

use App\Models\CulinaryResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CulinaryResourceController extends Controller
{
    public function index()
    {
        $resources = CulinaryResource::latest()->paginate(9);
        return view('culinary-resources.index', compact('resources'));
    }

    public function show(CulinaryResource $resource)
    {
        return view('culinary-resources.show', compact('resource'));
    }

    public function create()
    {
        return view('culinary-resources.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'type' => 'required|in:recipe_card,tutorial,video',
            'file' => [
                'required',
                'file',
                function ($attribute, $value, $fail) {
                    $extension = strtolower($value->getClientOriginalExtension());
                    if ($extension === 'mp4' || $extension === 'mov') {
                        // 300MB limit for video files
                        if ($value->getSize() > 314572800) { // 300 * 1024 * 1024
                            $fail('The video file may not be greater than 300MB.');
                        }
                    } else {
                        // 10MB limit for other files
                        if ($value->getSize() > 10485760) { // 10 * 1024 * 1024
                            $fail('The file may not be greater than 10MB.');
                        }
                    }
                },
                'mimes:pdf,doc,docx,mp4,mov,jpg,jpeg,png'
            ],
        ]);

        //Check for file
        if($request->hasFile('file')){

            //Store file and get path
            $path = $request->file('file')->store('culinary-resources','public');

            // send file path to database 
            $validated['file'] = $path;
        }

        CulinaryResource::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'type' => $validated['type'],
            'file_path' => $path,
        ]);

        return redirect()->route('culinary-resources.index')
            ->with('success', 'Resource uploaded successfully!');
    }

    public function download(CulinaryResource $resource)
    {
        return Storage::disk('public')->download($resource->file_path);
    }
}
