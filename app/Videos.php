<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    protected $table = 'videos';

    public static function getVideos() {
        $getVideos = Videos::where('status', 1)->get()->toArray();
        return $getVideos;
    }
}
