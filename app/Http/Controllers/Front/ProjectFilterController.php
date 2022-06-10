<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ProjectFilter;

class ProjectFilterController extends Controller
{
    public function projectFilter($id) {
        $data = ProjectFilter::findOrFail($id);
        return view('front.project_filter')->with(compact('data'));
    }
}
