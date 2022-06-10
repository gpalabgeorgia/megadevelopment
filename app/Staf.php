<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staf extends Model
{
    protected $table = 'staf';

    public static function getStaf() {
        $getStaf = Staf::where('status', 1)->get()->toArray();
        return $getStaf;
    }
}
