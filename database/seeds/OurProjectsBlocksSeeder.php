<?php

use Illuminate\Database\Seeder;
use App\OurProjectBlocks;

class OurProjectsBlocksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ourProjectsBlocksRecords = [
            ['id'=>1, 'title'=>'mega','description'=>'mega development project','price'=>'650','image'=>'', 'status'=>1],
            ['id'=>2, 'title'=>'isani','description'=>'mega development isani','price'=>'750','image'=>'','status'=>1],
            ['id'=>3, 'title'=>'bogdani','description'=>'mega development bogdani','price'=>'550','image'=>'', 'status'=>1]
        ];
        OurProjectBlocks::insert($ourProjectsBlocksRecords);
    }
}
