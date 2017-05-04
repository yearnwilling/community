<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert(
          array(
              'name' => 'admin',
              'email' => 'admin@community.com',
              'password' => bcrypt('admin'),
              'roles' => 'super_admin',
              'create_at' => date('m-d-y H:i:s'),
              'update_at' => date('m-d-y H:i:s')
          )
        );
    }
}
