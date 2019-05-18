<?php

use Illuminate\Database\Seeder;

class TerminationReasonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $termination= new \App\Model\TerminationReason();
        $termination->name = "Contract Not Renewed";
        $termination->save();


        $termination= new \App\Model\TerminationReason();
        $termination->name = "Deceased";
        $termination->save();

        $termination= new \App\Model\TerminationReason();
        $termination->name = "Dismissed";
        $termination->save();


        $termination= new \App\Model\TerminationReason();
        $termination->name = "Laid-off";
        $termination->save();


        $termination= new \App\Model\TerminationReason();
        $termination->name = "Other";
        $termination->save();


        $termination= new \App\Model\TerminationReason();
        $termination->name = "Physically Disabled/Compensated";
        $termination->save();



        $termination= new \App\Model\TerminationReason();
        $termination->name = "Resigned";
        $termination->save();

        $termination= new \App\Model\TerminationReason();
        $termination->name = "Resigned - Company Requested";
        $termination->save();


        $termination= new \App\Model\TerminationReason();
        $termination->name = "Resigned - Self Proposed";
        $termination->save();


        $termination= new \App\Model\TerminationReason();
        $termination->name = "Retired";
        $termination->save();





    }
}
