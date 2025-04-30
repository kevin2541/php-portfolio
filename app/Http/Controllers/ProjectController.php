<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of projects.
     */
    public function index()
    {
        $projects = Project::latest()->paginate(9);
        return view('projects', compact('projects'));
    }

    /**
     * Display a specific project.
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for creating a new project (admin).
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created project (admin).
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'url' => 'nullable|url',
            'github_url' => 'nullable|url',
            'completed_date' => 'nullable|date',
            'featured' => 'boolean',
            'technologies' => 'nullable|array',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        // Convert technologies to JSON
        if (isset($validated['technologies'])) {
            $validated['technologies'] = json_encode($validated['technologies']);
        }

        Project::create($validated);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project created successfully.');
    }

    /**
     * Show the form for editing a project (admin).
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update a project (admin).
     */
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'url' => 'nullable|url',
            'github_url' => 'nullable|url',
            'completed_date' => 'nullable|date',
            'featured' => 'boolean',
            'technologies' => 'nullable|array',
        ]);

        if ($request->hasFile('image')) {
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        // Convert technologies to JSON
        if (isset($validated['technologies'])) {
            $validated['technologies'] = json_encode($validated['technologies']);
        }

        $project->update($validated);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project updated successfully.');
    }

    /**
     * Delete a project (admin).
     */
    public function destroy(Project $project)
    {
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }
        
        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project deleted successfully.');
    }
}