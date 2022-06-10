<?php

use App\ProjectFilter;
use Illuminate\Database\Seeder;

class ProjectFilterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projectFilterRecords = [
            ['id'=>1, 'project'=>'Didube Tower', 'floor'=>'1','meter'=>'25', 'position'=>'მშენებარე', 'description'=>'', 'price'=>'865 ₾', 'images'=>'', 'status'=>1],
            ['id'=>2, 'project'=>'Mega Isani', 'floor'=>'5','meter'=>'55', 'position'=>'მიმდინარე', 'description'=>'', 'price'=>'865 ₾', 'images'=>'', 'status'=>1],
            ['id'=>3, 'project'=>'Mega Samgori', 'floor'=>'3','meter'=>'150', 'position'=>'მშენებარე', 'description'=>'', 'price'=>'865 ₾', 'images'=>'', 'status'=>1],
            ['id'=>4, 'project'=>'Other Project', 'floor'=>'7','meter'=>'85', 'position'=>'მიმდინარე', 'description'=>'', 'price'=>'865 ₾', 'images'=>'', 'status'=>1],
        ];
        ProjectFilter::insert($projectFilterRecords);
    }
}
