<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OurProjectsSlider extends Model
{
    protected $table = 'our_projects_slider';

    public static function getOurProjectsSlider() {
        $getOurProjectsSlider = OurProjectsSlider::where('status', 1)->get()->toArray();
        return $getOurProjectsSlider;
    }
}
