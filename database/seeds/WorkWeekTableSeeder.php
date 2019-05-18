<?php

use Illuminate\Database\Seeder;

class WorkWeekTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $workWeek = new \App\Model\WorkWeek();
        $workWeek->company_id = 1;
        $workWeek->mon = 0;
        $workWeek->tue = 0;
        $workWeek->wed = 0;
        $workWeek->thu = 0;
        $workWeek->fri = 0;
        $workWeek->sat = 0;
        $workWeek->sun = 0;
        $workWeek->save();
        //
    }
}
