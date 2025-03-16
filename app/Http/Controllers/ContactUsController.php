<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class ContactUsController extends Controller
{
    // @desc   Show Contact Us Form
    // @route  GET/contactus
    public function index():View
    {
        return view('contact-us.index');
    }

    public function store(Request $request):RedirectResponse
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject'=>'required|string',
            'message' => 'required|max:1000'
        ]);   

        $validateData['user_id'] = auth()->user()->id;
        $contactus = ContactUs::create($validateData);
        return redirect()->route('contactus.index')->with('success','Thank you for contacting us. We will get back to you soon.');
    }
}
