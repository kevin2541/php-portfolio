<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\About;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of contact messages (admin).
     */
    public function index()
    {
        $contacts = Contact::latest()->paginate(10);
        return view('admin.contacts.index', compact('contacts'));
    }

    /**
     * Show the contact form.
     */
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

    /**
     * Display a specific contact message (admin).
     */
    public function show(Contact $contact)
    {
        $contact->update(['read' => true]);
        return view('admin.contacts.show', compact('contact'));
    }

    /**
     * Delete a contact message (admin).
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contacts.index')
            ->with('success', 'Message deleted successfully.');
    }
}