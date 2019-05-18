<?php

use App\Model\TerminationReason;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(RoleTableSeeder::class);
        // User seeder will use the roles above created.
        //$this->call(UserTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(CompanyTableSeeder::class);
        $this->call(MenuTableSeeder::class);
        $this->call(RoleCompanyMenuTableSeeder::class);
        $this->call(PayPeriodsTableSeeder::class);
        $this->call(TerminationReasonTableSeeder::class);
        $this->call(LeaveStatusTableSeeder::class);
        $this->call(LeaveTypeTableSeeder::class);
        $this->call(EmployementStatuasTableSeeder::class);
        $this->call(WorkWeekTableSeeder::class);
        $this->call(leaveEntitlementTypeTableSeeder::class);

        // Ask for db migration refresh, default is no
        if ($this->command->confirm('Do you wish to refresh migration before seeding, it will clear all old data ?')) {
            // Call the php artisan migrate:refresh
            $this->command->call('migrate:refresh');
            $this->command->warn("Data cleared, starting from blank database.");
        }

        $this->command->warn('All done :)');
    }

}
