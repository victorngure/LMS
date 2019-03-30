<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'leave-request',
            'leave-approve',

            'role-list',
            'role-create',
            'role-store',
            'role-edit',
            'role-update',
            'role-delete',
    
            'user-list',
            'user-create',
            'user-store',
            'user-edit',
            'user-update',
            'user-delete', 
         ]; 
 
         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }
    }
}
