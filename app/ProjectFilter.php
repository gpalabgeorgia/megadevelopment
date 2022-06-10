<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\OurProjectBlocks;

class ProjectFilter extends Model
{
    protected $table = "project_filter";

    public static function getProjectFilter() {
        $getProjectFilter = ProjectFilter::where('status', 1)->get()->toArray();
        return $getProjectFilter;
    }
    public function ourProjectBlocks()
    {
        return $this->belongsTo(OurProjectBlocks::class, "id", 'project_filter_id');
    }
}
