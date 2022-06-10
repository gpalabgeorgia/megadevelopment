<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Section;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function about() {
        $sections = Section::where('status', 1);
        return view('front.about_us')->with(compact($sections));
    }
}
