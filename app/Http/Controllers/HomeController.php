<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Skill;
use App\Models\Project;

class HomeController extends Controller
{
    /**
     * Display the home page.
     */
    public function index()
    {
        $about = About::first();
        $skills = Skill::all()->groupBy('category');
        $featuredProjects = Project::where('featured', true)->take(3)->get();
        
        return view('home', compact('about', 'skills', 'featuredProjects'));
    }
}