<?php

use Illuminate\Database\Seeder;
use App\Special;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specialRecords = [
            ['id'=>1,'name'=>'მთავარი','url'=>'/', 'status'=>1],
            ['id'=>2,'name'=>'ჩვენს შესახებ','url'=>'about_us', 'status'=>1]
        ];
        Special::insert($specialRecords);
    }
}
