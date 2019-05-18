<?php

use Illuminate\Database\Seeder;

class leaveEntitlementTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $entitlementTypes = new \App\Model\LeaveEntitlemenType();
        $entitlementTypes->company_id = 1;
        $entitlementTypes->name = "added";
        $entitlementTypes->save();
        //
    }
}
