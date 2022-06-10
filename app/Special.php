<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Special extends Model
{
    protected $table = 'special';
    public static function getSpecial() {
        $getSpecial = Special::where('status', 1)->get()->toArray();
        return $getSpecial;
    }
}
