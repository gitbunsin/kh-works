<?php

use Illuminate\Database\Seeder;

class PayPeriodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $leavetype = new \App\Model\Payperiod();
        $leavetype->name = "Weekly";
        $leavetype->save();



        $leavetype = new \App\Model\Payperiod();
        $leavetype->name = "Bi Weekly";
        $leavetype->save();


        $leavetype = new \App\Model\Payperiod();
        $leavetype->name = "Semi Monthly";
        $leavetype->save();


        $leavetype = new \App\Model\Payperiod();
        $leavetype->name = "Monthly";
        $leavetype->save();


        $leavetype = new \App\Model\Payperiod();
        $leavetype->name = "Monthly on first pay of month";
        $leavetype->save();


        $leavetype = new \App\Model\Payperiod();
        $leavetype->name = "Hourly";
        $leavetype->save();




        //
    }
}
