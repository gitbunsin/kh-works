<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_employee = new Role();
        $role_employee->name = 'Admin';
        $role_employee->description = 'A Manager User';
        $role_employee->save();
        $role_manager = new Role();
        $role_manager->name = 'Ess';
        $role_manager->description = 'A Employee User';
        $role_manager->save();
  }
}
