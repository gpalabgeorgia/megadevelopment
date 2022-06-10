<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ProjectFilter;

class OurProjectBlocks extends Model
{
    protected $table = 'our_projects_blocks';
    public static function getOurProjectsBlocks() {
        $getOurProjectsBlocks = OurProjectBlocks::where('status', 1)->get()->toArray();
        return $getOurProjectsBlocks;
    }
    public function projectFilter()
    {
        return $this->hasOne(ProjectFilter::class, "id", "project_filter_id");
    }
}
