<?php

use Illuminate\Database\Seeder;

class LeaveTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $leavetype = new \App\Model\LeaveType();
        $leavetype->name = "FMIA US";
        $leavetype->save();

        $leavetype1 = new \App\Model\LeaveType();
        $leavetype1->name="Maternity US";
        $leavetype1->save();

        $leavetype2 = new \App\Model\LeaveType();
        $leavetype2->name ="Paternity's US";
        $leavetype2->save();

        $leavetype3 = new \App\Model\LeaveType();
        $leavetype3->name = "Vacations US";
        $leavetype3->save();
        //
    }
}
