<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blog';
    public static function getBlog() {
        $getBlog = Blog::where('status',1)->get()->toArray();
        return $getBlog;
    }
}
