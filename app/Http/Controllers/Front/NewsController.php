<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;

class NewsController extends Controller
{
    public function news() {
        $news = Blog::where('status',1);
        return view('front.news')->with(compact('news'));
    }
}
