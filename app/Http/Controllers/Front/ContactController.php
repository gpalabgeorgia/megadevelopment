<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ContactBlock;
use App\ContactBanner;

class ContactController extends Controller
{
    public function contact() {
        $contact = ContactBlock::where('status', 1);
        $contactBanner = ContactBanner::where('status',1);
        return view('front.contact')->with(compact('contact','contactBanner'));
    }
}
