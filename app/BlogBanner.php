<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogBanner extends Model
{
    protected $table = 'blog_banner';
    public static function getBlogBanner() {
        $getBlogBanner = BlogBanner::where('status', 1)->get()->toArray();
        return $getBlogBanner;
    }
}
