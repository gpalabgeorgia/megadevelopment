<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\OurProjects;

class ProjectsController extends Controller
{
    public function projects() {
        $projects = OurProjects::where('status',1);
        return view('front.projects')->with(compact('projects'));
    }
}
