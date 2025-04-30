<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the skills.
     */
    public function index()
    {
        $skills = Skill::all()->groupBy('category');
        return view('admin.skills.index', compact('skills'));
    }

    /**
     * Show the form for creating a new skill.
     */
    public function create()
    {
        $categories = ['frontend', 'backend', 'devops', 'design', 'other'];
        return view('admin.skills.create', compact('categories'));
    }

    /**
     * Store a newly created skill in database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'proficiency' => 'required|integer|min:1|max:100',
            'icon' => 'nullable|string|max:255',
        ]);

        Skill::create($validated);

        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill created successfully.');
    }

    /**
     * Show the form for editing the specified skill.
     */
    public function edit(Skill $skill)
    {
        $categories = ['frontend', 'backend', 'devops', 'design', 'other'];
        return view('admin.skills.edit', compact('skill', 'categories'));
    }

    /**
     * Update the specified skill in storage.
     */
    public function update(Request $request, Skill $skill)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'proficiency' => 'required|integer|min:1|max:100',
            'icon' => 'nullable|string|max:255',
        ]);

        $skill->update($validated);

        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill updated successfully.');
    }

    /**
     * Remove the specified skill from storage.
     */
    public function destroy(Skill $skill)
    {
        $skill->delete();

        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill deleted successfully.');
    }
}