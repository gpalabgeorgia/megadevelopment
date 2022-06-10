<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutSlider extends Model
{
    protected $table = 'about_slider';

    public static function getAboutSlider() {
        $getAboutSlider = AboutSlider::where('status', 1)->get()->toArray();
        return $getAboutSlider;
    }
}
