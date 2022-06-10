<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {
        $page_name = "index";
//        dd($page_name);
        return view('front.index')->with(compact('page_name'));
    }
}
