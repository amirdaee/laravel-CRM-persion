<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('roles')->delete();
        \DB::table('permission_role')->delete();
        
        $create_user = Permission::where('name','create_user')->first();
        $delete_user = Permission::where('name','delete_user')->first();
        $add_order = Permission::where('name','add_order')->first();
        $delete_order = Permission::where('name','delete_order')->first();


        \DB::table('roles')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'name' => 'Admin',
                    'created_at' => '2016-06-04 13:42:19',
                    'updated_at' => '2016-06-04 13:42:19',
                ),
            1 =>
                array (
                    'id' => 2,
                    'name' => 'Customer',
                    'created_at' => '2016-06-04 13:42:19',
                    'updated_at' => '2016-06-04 13:42:19',
                ),
        ));

        $role = Role::where('name','Admin')->first();
        $role->permissions()->attach($create_user);

        $role = Role::where('name','Admin')->first();
        $role->permissions()->attach($delete_user);

        $role = Role::where('name','Admin')->first();
        $role->permissions()->attach($add_order);

        $role = Role::where('name','Admin')->first();
        $role->permissions()->attach($delete_order);

        //customer permission

        $role = Role::where('name','Customer')->first();
        $role->permissions()->attach($add_order);



    }
}
