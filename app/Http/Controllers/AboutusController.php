<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class AboutusController extends Controller
{
    // @desc   Show about us page
    // @route  GET/aboutus
    public function index():View
    {
        return view('aboutus.index');
    }
}
