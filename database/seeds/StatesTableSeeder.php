<?php

use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $service = \App\Service::where('name','ثبت شرکت')->first();
        \DB::table('states')->insert(array (
            0 =>
                array (
                    'name' => 'ثبت اطلاعات در سامانه',
                    'service_id' => $service->id,
                    'position' => 1,
                    'created_at' => '2016-06-04 13:42:19',
                    'updated_at' => '2016-06-04 13:42:19',
                ),

            1 =>
                array (
                    'name' => 'اولین واریز',
                    'service_id' => $service->id,
                    'position' => 2,
                    'created_at' => '2016-06-04 13:42:19',
                    'updated_at' => '2016-06-04 13:42:19',
                ),
            2 =>
                array (
                    'name' => 'ارسال اطلاعات به سازمان',
                    'service_id' => $service->id,
                    'position' => 3,
                    'created_at' => '2016-06-04 13:42:19',
                    'updated_at' => '2016-06-04 13:42:19',
                ),
            3 =>
                array (
                    'name' => 'ثبت نام شرکت',
                    'service_id' => $service->id,
                    'position' => 4,
                    'created_at' => '2016-06-04 13:42:19',
                    'updated_at' => '2016-06-04 13:42:19',
                ),
            4 =>
                array (
                    'name' => 'واریز دوم',
                    'service_id' => $service->id,
                    'position' => 5,
                    'created_at' => '2016-06-04 13:42:19',
                    'updated_at' => '2016-06-04 13:42:19',
                ),
        ));
    }
}
