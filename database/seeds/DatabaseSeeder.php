<?php

use Illuminate\Database\Seeder;
use App\Permission;
use App\Role;
use App\User;
use App\Cheque;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
  public function run()
    {
        $this->call(PermissionTableSeeder::class);
        $this->call(SysAdminSeeder::class);
        $this->call(RolesSeeder::class);;
    }
    
}
