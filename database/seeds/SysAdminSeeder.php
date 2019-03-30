<?php

use Illuminate\Database\Seeder;

class SysAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
		    'staff_number' => 'ADMIN',
            'name' => 'Administrator',
		    'email' => 'admin@roc.com',
		    'password' => bcrypt('secret'),
		    'created_at' => date('Y-m-d H:i:s'),
		    'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
