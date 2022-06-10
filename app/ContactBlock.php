<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactBlock extends Model
{
    protected $table = 'contact_block';
    public static function getContactBlock() {
        $getContactBlock = ContactBlock::where('status', 1)->get()->toArray();
        return $getContactBlock;
    }
}
