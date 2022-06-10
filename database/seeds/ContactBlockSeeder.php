<?php

use Illuminate\Database\Seeder;
use App\ContactBlock;

class ContactBlockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contactBlockRecords = [
            ['id'=>1, 'title'=>'ცენტრალური ოფისი','address'=>'წინანდლის ქ. 10, საქართვრელო, თბილისი','phone'=>'599744538','email'=>'test@test.com',
                'secondTitle'=>'მოგვწერეთ','status'=>1],
            ['id'=>2, 'title'=>'ცენტრალური ოფისი','address'=>'წინანდლის ქ. 10, საქართვრელო, თბილისი','phone'=>'599744538','email'=>'test@test.com',
                'secondTitle'=>'მოგვწერეთ','status'=>1],
            ['id'=>3, 'title'=>'ცენტრალური ოფისი','address'=>'წინანდლის ქ. 10, საქართვრელო, თბილისი','phone'=>'599744538','email'=>'test@test.com',
                'secondTitle'=>'მოგვწერეთ','status'=>1]
        ];
        ContactBlock::insert($contactBlockRecords);
    }
}
