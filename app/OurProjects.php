<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OurProjects extends Model
{
    protected $guard = "our_projects";

    public static function getOurProjects() {
        $getOurProjects = OurProjects::where('status', 1)->get()->toArray();
        return $getOurProjects;
    }
}
