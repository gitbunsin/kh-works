<?php

use App\Model\EmploymentStatus;
use Illuminate\Database\Seeder;

class EmployementStatuasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $EmploymentStatus = new EmploymentStatus();
        $EmploymentStatus->name = "Freelance";
        $EmploymentStatus->description ="self-employed and hired to work for different companies on particular assignments.";
        $EmploymentStatus->save();


        $EmploymentStatus = new EmploymentStatus();
        $EmploymentStatus->name = "Full-Time Contract";
        $EmploymentStatus->description ="in which a person works a minimum number of hours defined as such by their employer.";
        $EmploymentStatus->save();


        $EmploymentStatus = new EmploymentStatus();
        $EmploymentStatus->name = "Full-Time Permanent";
        $EmploymentStatus->description ="employee is someone who works the “ordinary hours” for the occupation defined by the award or agreement covering the work";
        $EmploymentStatus->save();

        $EmploymentStatus = new EmploymentStatus();
        $EmploymentStatus->name = "Full-Time Probation";
        $EmploymentStatus->description ="in a company's employee handbook, which is given to workers when they first begin a job.";
        $EmploymentStatus->save();


        $EmploymentStatus = new EmploymentStatus();
        $EmploymentStatus->name = "Part-Time Contract";
        $EmploymentStatus->description ="is a form of employment that carries fewer hours per week than a full-time job.";
        $EmploymentStatus->save();


        $EmploymentStatus = new EmploymentStatus();
        $EmploymentStatus->name = "Part-Time Internship";
        $EmploymentStatus->description ="An intern works at a company for a fixed period of time, usually three to six months;";
        $EmploymentStatus->save();



        //
    }
}
