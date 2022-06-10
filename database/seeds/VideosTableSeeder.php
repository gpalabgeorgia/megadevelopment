<?php

use App\Videos;
use Illuminate\Database\Seeder;

class VideosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $videos = [
            ['id'=>1, 'title'=>'mega','image'=>'','video'=>'', 'status'=>1],
            ['id'=>2, 'title'=>'isani','image'=>'','video'=>'','status'=>1],
            ['id'=>3, 'title'=>'bogdani','image'=>'','video'=>'', 'status'=>1]
        ];
        Videos::insert($videos);
    }
}
