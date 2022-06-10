<?php

use Illuminate\Database\Seeder;
use App\Staf;

class StafTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stafRecords = [
            ['id'=>1, 'fullName'=>'ტიაო მკვლელი','post'=>'პრემიერ მინისტრი', 'description'=>'ტვინს ტყნავს პოლიტიკით და არც ესმის', 'image'=>'', 'status'=>1],
        ];
        Staf::insert($stafRecords);
    }
}
