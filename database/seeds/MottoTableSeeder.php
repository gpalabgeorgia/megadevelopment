<?php

use Illuminate\Database\Seeder;
use App\Motto;

class MottoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mottoRecords = [
            ['id'=>1, 'title'=>'JOIN OUR TEAM ','description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit,
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas
            accumsan lacus vel facilisis. Phasellus eget nibh nec nibh porta semper a nec turpis. Interdum et malesuada fames ac ante ipsum primis in
            faucibus. ', 'status'=>1],
            ['id'=>2, 'title'=>'WORK REMOTE','description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
            labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Praesent
            viverra non massa id condimentum. Morbi malesuada laoreet neque, id mattis neque ullamcorper eget. Vivamus aliquam tempus velit, sit amet
            scelerisque diam scelerisque ut. Donec venenatis dolor eu ante tincidunt varius. ', 'status'=>1],
        ];
        Motto::insert($mottoRecords);
    }
}
