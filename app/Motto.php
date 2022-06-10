<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Motto extends Model
{
    protected $table = 'motto';
    public static function getMotto() {
        $getMotto = Motto::where('status',1)->get()->toArray();
        return $getMotto;
    }
}
