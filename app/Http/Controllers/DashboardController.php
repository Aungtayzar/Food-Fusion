<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $user = auth()->user();
        $recipesCount = $user->recipes()->count();
        $favoritesCount = $user->favorites()->count();
        $commentsCount = $user->comments()->count();
        
        return view('dashboard.index', compact('user','recipesCount','favoritesCount','commentsCount'));
    }
}
