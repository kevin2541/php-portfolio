<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Display the about page.
     */
    public function index()
    {
        $about = About::first();
        $skills = Skill::all()->groupBy('category');
        
        return view('about', compact('about', 'skills'));
    }

    /**
     * Show the form for editing the about information.
     */
    public function edit()
    {
        $about = About::first();
        return view('admin.about.edit', compact('about'));
    }

    /**
     * Update the about information.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'bio' => 'required|string',
            'profile_image' => 'nullable|image|max:2048',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'github' => 'nullable|url',
        ]);

        $about = About::first();
        
        if ($request->hasFile('profile_image')) {
            if ($about && $about->profile_image) {
                Storage::disk('public')->delete($about->profile_image);
            }
            $validated['profile_image'] = $request->file('profile_image')->store('profile', 'public');
        }

        if ($about) {
            $about->update($validated);
        } else {
            About::create($validated);
        }

        return redirect()->route('admin.about.edit')
            ->with('success', 'About information updated successfully.');
    }
}