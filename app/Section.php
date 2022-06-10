<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table = 'sections';
    public static function getSections() {
//        $getSections = Section::select('id','name','url');
        $getSections = Section::where('status', 1)->get();
        return $getSections;
    }
}
