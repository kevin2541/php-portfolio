<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Contact;
use App\Models\Skill;

class AdminController extends Controller
{
    public function index()
    {
        $projectCount = Project::count();
        $skillCount = Skill::count();
        $unreadMessages = Contact::where('read', false)->count();
        $recentProjects = Project::latest()->take(5)->get();
        $recentMessages = Contact::latest()->take(5)->get();
        
        return view('admin.dashboard', compact(
            'projectCount', 
            'skillCount', 
            'unreadMessages', 
            'recentProjects', 
            'recentMessages'
        ));
    }
}
