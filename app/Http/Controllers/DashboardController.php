<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\ContactUs;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class DashboardController extends Controller
{
    use AuthorizesRequests;
    public function index(): View
    {
        $user = Auth::user();
        $recipesCount = $user->recipes()->count();
        $favoritesCount = $user->favorites()->count();
        $commentsCount = $user->comments()->count();
        
        return view('dashboard.index', compact('user','recipesCount','favoritesCount','commentsCount'));
    }

    public function contact(): View
    {
        $this->authorize('viewAny', ContactUs::class);
        
        $messages = ContactUs::with('user')
            ->latest()
            ->paginate(10)->appends(request()->query('page'));
            
        return view('dashboard.contact', compact('messages'));
    }
}
