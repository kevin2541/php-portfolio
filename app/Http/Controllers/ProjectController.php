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
}