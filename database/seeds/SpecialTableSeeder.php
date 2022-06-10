<?php

use Illuminate\Database\Seeder;
use App\Special;

class SpecialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specialRecords = [
            ['id'=>1, 'title'=>'ეკო სახლები','description'=>'Lorem ipsum dolor sit amet, consectetur adipi-scing elit, sed do eiusmod tempor incididunt ut
            labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.', 'status'=>1],
            ['id'=>2, 'title'=>'დაცული გარემო','description'=>'Lorem ipsum dolor sit amet, consectetur adipi-scing elit, sed do eiusmod tempor incididunt ut
            labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.', 'status'=>1],
            ['id'=>3, 'title'=>'პარკინგი','description'=>'Lorem ipsum dolor sit amet, consectetur adipi-scing elit, sed do eiusmod tempor incididunt ut
            labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.', 'status'=>1],
            ['id'=>4, 'title'=>'კეთილმოწყობა','description'=>'Lorem ipsum dolor sit amet, consectetur adipi-scing elit, sed do eiusmod tempor incididunt ut
            labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.', 'status'=>1],
            ['id'=>5, 'title'=>'საუკეთესო არჩევანი','description'=>'Lorem ipsum dolor sit amet, consectetur adipi-scing elit, sed do eiusmod tempor incididunt ut
            labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.', 'status'=>1]
        ];
        Special::insert($specialRecords);
    }
}
