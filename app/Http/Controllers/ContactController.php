<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\About;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create()
    {
        $about = About::first();
        return view('contact', compact('about'));
    }

    /**
     * Store a contact message.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Add read status (default: false)
        $validated['read'] = false;

        Contact::create($validated);

        return redirect()->route('contact')
            ->with('success', 'Your message has been sent successfully!');
    }
}