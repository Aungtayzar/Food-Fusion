<?php

namespace App\Http\Controllers;
use App\Models\Recipe;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $recipes = Recipe::latest()->limit(6)->get();
        return view('pages.index',compact('recipes'));
    }
}
