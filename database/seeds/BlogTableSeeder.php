<?php

use App\Blog;
use Illuminate\Database\Seeder;


class BlogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blogRecords = [
            ['id'=>1, 'image'=>'','datetime'=>'12.05.2022', 'title'=>'Example', 'description'=>'Example description', 'status'=>1],
        ];
        Blog::insert($blogRecords);
    }
}
