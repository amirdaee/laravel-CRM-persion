<?php

use Illuminate\Database\Seeder;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('services')->insert(array (
            0 =>
                array (
                    'name' => 'sabte_sherkat',
                    'discription' => 'ثبت شرکت',
                ),

            1 =>
                array (
                    'name' => 'sabte_berand',
                    'discription' => 'ثبت برند',
                ),
        ));
    }
}
