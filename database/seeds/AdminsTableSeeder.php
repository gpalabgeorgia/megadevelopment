<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->delete();
        $adminRecords = [
          ['id'=>1,'name'=>'admin', 'type'=>'admin','mobile'=>'998800','email'=>'admin@admin.com',
              'password'=>'$2y$10$4XuppaAIKy19XWRv0CAVx.Y7NU6o852GVXOoVC9YZ/oogBhLynxeK','image'=>'','status'=>1],
        ];
        DB::table('admins')->insert($adminRecords);
//        foreach ($adminRecords as $key => $record) {
//            \App\Admin::create($record);
//        }
    }
}
