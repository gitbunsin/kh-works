<?php

use Illuminate\Database\Seeder;

class LeaveStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $leaveStatus = new \App\Model\LeaveStatus();
        $leaveStatus->status = - 1;
        $leaveStatus->name = "REJECTED";
        //

        $leaveStatus = new \App\Model\LeaveStatus();
        $leaveStatus->status = 0;
            $leaveStatus->name = "CANCELLED";
        $leaveStatus->save();

        $leaveStatus = new \App\Model\LeaveStatus();
        $leaveStatus->status = 1;
            $leaveStatus->name = "PENDING APPROVAL";
        $leaveStatus->save();


        $leaveStatus = new \App\Model\LeaveStatus();
        $leaveStatus->status = 2;
            $leaveStatus->name = "SCHEDULED";
        $leaveStatus->save();


        $leaveStatus = new \App\Model\LeaveStatus();
        $leaveStatus->status = 3;
            $leaveStatus->name = "TAKEN";
        $leaveStatus->save();

        $leaveStatus = new \App\Model\LeaveStatus();
        $leaveStatus->status = 4;
            $leaveStatus->name = "WEEKEND";
        $leaveStatus->save();

        $leaveStatus = new \App\Model\LeaveStatus();
        $leaveStatus->status = 5;
            $leaveStatus->name = "HOLIDAY";
        $leaveStatus->save();
    }
}
