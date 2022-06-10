<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OurProjectsBanner extends Model
{
    protected $table = 'our_project_banner';
    public static function getOurProjectBanner() {
        $getOurProjectBanner = OurProjectsBanner::where('status', 1)->get()->toArray();
        return $getOurProjectBanner;
    }
}
