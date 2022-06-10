<?php

use Illuminate\Database\Seeder;
use App\Banner;

class BannersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bannerRecords = [
            ['id'=>1, 'title'=>'mega','description'=>'mega development project','image'=>'', 'price'=>'450', 'status'=>1],
            ['id'=>2, 'title'=>'isani','description'=>'mega development isani','image'=>'', 'price'=>'550', 'status'=>1],
            ['id'=>3, 'title'=>'bogdani','description'=>'mega development bogdani','image'=>'', 'price'=>'420', 'status'=>1]
        ];
        Banner::insert($bannerRecords);
    }
}
