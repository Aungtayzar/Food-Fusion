<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Recipe;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // @desc   Show Home page
    // @route  GET / 
    public function index(){
        $recipes = Recipe::latest()->limit(6)->get();
        $featuredEvents = Event::featured()->upcoming()->take(3)->get();
        $upcomingEvents = Event::upcoming()->paginate(6);
    
        return view('pages.index',compact('recipes','featuredEvents', 'upcomingEvents'));
    }
}
