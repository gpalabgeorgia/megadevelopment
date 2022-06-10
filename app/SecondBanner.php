<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SecondBanner extends Model
{
    protected $table = 'second_banner';

    public static function getSecondBanner() {
        $getSecondBanner = SecondBanner::where('status', 1)->get()->toArray();
        return $getSecondBanner;
    }
}
