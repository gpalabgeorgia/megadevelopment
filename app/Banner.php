<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $guard = 'banners';

    public static function getBanners() {
        $getBanners = Banner::where('status', 1)->get()->toArray();
//        echo "<pre>"; print_r($getBanners); die;
        return $getBanners;
    }
}
