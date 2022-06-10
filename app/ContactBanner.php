<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactBanner extends Model
{
    protected $table = 'contact_banner';
    public static function getContactBanner() {
        $getContactBanner = ContactBanner::where('status', 1)->get()->toArray();
        return $getContactBanner;
    }
}
