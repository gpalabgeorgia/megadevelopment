<?php

use Illuminate\Database\Seeder;
use App\OurProjects;

class OurProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ourProjectsRecords = [
            ['id'=>1, 'title'=>'mega','description'=>'mega development project','image'=>'', 'status'=>1],
            ['id'=>2, 'title'=>'isani','description'=>'mega development isani','image'=>'','status'=>1],
            ['id'=>3, 'title'=>'bogdani','description'=>'mega development bogdani','image'=>'', 'status'=>1]
        ];
        OurProjects::insert($ourProjectsRecords);
    }
}
