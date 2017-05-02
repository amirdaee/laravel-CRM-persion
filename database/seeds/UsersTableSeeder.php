<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_role = Role::where('name','Admin')->first();
        $customer_role = Role::where('name','Customer')->first();

        \DB::table('users')->delete();
        \DB::table('role_user')->delete();

        \DB::table('users')->insert(array (
            0 =>
                array (
                    'name' => 'Admin',
                    'login_name' => 'amir',
                    'email' => 'admin@admin.com',
                    'password' => bcrypt('123'),
                    'phone_number' => '09156246268',
                    'city' => 'تهران',
                    'address' => '',
                    'image_path' => '',
                    'created_at' => '2016-06-04 13:42:19',
                    'updated_at' => '2016-06-04 13:42:19',
                ),

            1 =>
                array (
                    'name' => 'محمدحسن',
                    'login_name' => 'mohammad',
                    'email' => 'customer@customer.com',
                    'password' => bcrypt('123'),
                    'phone_number' => '09156246268',
                    'city' => 'تهران',
                    'address' => '',
                    'image_path' => '',
                    'created_at' => '2016-06-04 13:42:19',
                    'updated_at' => '2016-06-04 13:42:19',
                ),
        ));

        $user = User::where('login_name','amir')->first();
        $user->roles()->attach($admin_role);
        $user = User::where('login_name','mohammad')->first();
        $user->roles()->attach($customer_role);
    }
}
