<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    use AuthorizesRequests;
    // @desc   List of Events
    // @route  GET/events
    public function index()
    {
        $this->authorize('viewAny', Event::class);
        $events = Event::upcoming()->paginate(10);
        return view('events.index', compact('events'));
    }

   // @desc   Show Create Event Form
    // @route  GET /events
    public function create()
    {
        $this->authorize('create', Event::class);
        return view('events.create');
    }

    // @desc   Store a new event
    // @route  POST /events
    public function store(Request $request)
    {
        $this->authorize('create', Event::class);
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'location' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
            'is_featured' => 'boolean'
        ]);

        $validated['user_id'] = auth()->user()->id;
        
        // Handle the image upload
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('events', 'public');
            $validated['image_path'] = $path;
        }
        
        Event::create($validated);
        
        return redirect()->route('events.index')->with('success', 'Event created successfully');
    }

    // @desc   Show event detail
    // @route  GET/events/{event}
    public function show(Event $event)
    {
        $this->authorize('view', $event);
        return view('events.show', compact('event'));
    }

    // @desc   Show event form
    // @route  GET/events/{event}
    public function edit(Event $event)
    {
        $this->authorize('update', $event);
        return view('events.edit', compact('event'));
    }

   // @desc   Update a  event
    // @route  PUT /events/{event}
    public function update(Request $request, Event $event)
    {
        $this->authorize('update', $event);
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'location' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
            'is_featured' => 'boolean'
        ]);
        
        // Handle the image upload
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($event->image_path) {
                Storage::disk('public')->delete($event->image_path);
            }
            
            $path = $request->file('image')->store('events', 'public');
            $validated['image_path'] = $path;
        }
        
        $event->update($validated);
        
        return redirect()->route('events.index')->with('success', 'Event updated successfully');
    }

     // @desc   delete a  event
    // @route  DELETE /events/{event}
    public function destroy(Event $event)
    {
        $this->authorize('delete', $event);
        // Delete the image if it exists
        if ($event->image_path) {
            Storage::disk('public')->delete($event->image_path);
        }
        
        $event->delete();
        
        return redirect()->route('events.index')->with('success', 'Event deleted successfully');
    }
    

}