<?php

use Illuminate\Database\Seeder;
use App\Model\Backend\Menu;
class MenuTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $menu1 = new Menu();
        $menu1->id = 1;
        $menu1->name = "Admin";
        $menu1->parent_id = 0;
        $menu1->save();

        $menu1 = new Menu();
        $menu1->id = 2;
        $menu1->name = "User management";
        $menu1->link= "";
        $menu1->parent_id = 1;
        $menu1->save();

        $menu1 = new Menu();
        $menu1->id = 3;
        $menu1->name = "User";
        $menu1->link ="administration/user";
        $menu1->parent_id = 2;
        $menu1->save();

        $menu1 = new Menu();
        $menu1->id = 4;
        $menu1->name = "Job";
        $menu1->link ="";
        $menu1->parent_id = 1;
        $menu1->save();

        $menu1 = new Menu();
        $menu1->id = 5;
        $menu1->name = "Job Title";
        $menu1->link="administration/jobs-title";
        $menu1->parent_id = 4;
        $menu1->save();


        $menu1 = new Menu();
        $menu1->id = 6;
        $menu1->name = "Job Category";
        $menu1->link="administration/jobs-category";
        $menu1->parent_id = 4;
        $menu1->save();

        $menu1 = new Menu();
        $menu1->id = 7;
        $menu1->name = "Pay Grades";
        $menu1->link="administration/pay-grade";
        $menu1->parent_id = 4;
        $menu1->save();

        $menu1 = new Menu();
        $menu1->id = 8;
        $menu1->name = "Employee Status";
        $menu1->link ="administration/employment-status";
        $menu1->parent_id = 4;
        $menu1->save();

        $menu1 = new Menu();
        $menu1->id = 9;
        $menu1->name = "Work Shifts";
        $menu1->link="administration/companyProfile";
        $menu1->parent_id = 4;
        $menu1->save();

        $menu1 = new Menu();
        $menu1->id = 10;
        $menu1->name = "Organization";
        $menu1->link ="administration/locations";
        $menu1->parent_id = 1;
        $menu1->save();

        $menu1 = new Menu();
        $menu1->id = 11;
        $menu1->name = "General Information";
        $menu1->link ="administration/companyProfile";
        $menu1->parent_id = 10;
        $menu1->save();

        $menu1 = new Menu();
        $menu1->id = 12;
        $menu1->name = "Locations";
        $menu1->link ="administration/locations";
        $menu1->parent_id = 10;
        $menu1->save();

        $menu1 = new Menu();
        $menu1->id = 13;
        $menu1->name = "Structure";
        $menu1->link="administration/view-company-structure";
        $menu1->parent_id = 10;
        $menu1->save();

        $menu1 = new Menu();
        $menu1->id = 14;
        $menu1->name = "Qualifications";
        $menu1->link="administration/skills";
        $menu1->parent_id = 1;
        $menu1->save();


        $menu1 = new Menu();
        $menu1->id = 15;
        $menu1->name = "Skills";
        $menu1->link ="administration/skills";
        $menu1->parent_id = 14;
        $menu1->save();

        $menu1 = new Menu();
        $menu1->id = 16;
        $menu1->name = "Education";
        $menu1->link="administration/education";
        $menu1->parent_id = 14;
        $menu1->save();


        $menu1 = new Menu();
        $menu1->id = 17;
        $menu1->name = "LicenseType";
        $menu1->link="administration/license-types";
        $menu1->parent_id = 14;
        $menu1->save();

        $menu1 = new Menu();
        $menu1->id = 18;
        $menu1->name = "Language";
        $menu1->link="administration/language";
        $menu1->parent_id = 14;
        $menu1->save();


        $menu1 = new Menu();
        $menu1->id = 19;
        $menu1->name = "Memberships";
        $menu1->link="administration/membership";
        $menu1->parent_id = 14;
        $menu1->save();


        $menu1 = new Menu();
        $menu1->id = 20;
        $menu1->name = "Nationalities";
        $menu1->link="administration/nationality'";
        $menu1->parent_id = 1;
        $menu1->save();


        $menu1 = new Menu();
        $menu1->id = 21;
        $menu1->name = "Configuration";
        $menu1->link ="administration/list-Mail-Configuration";
        $menu1->parent_id = 1;
        $menu1->save();

        $menu1 = new Menu();
        $menu1->id = 22;
        $menu1->name = "Email Configuration";
        $menu1->link ="administration/list-Mail-Configuration";
        $menu1->parent_id = 21;
        $menu1->save();


        $menu1 = new Menu();
        $menu1->id = 23;
        $menu1->name = "Email Subscription";
        $menu1->link="administration/view-Email-Notification";
        $menu1->parent_id = 21;
        $menu1->save();

        $menu1 = new Menu();
        $menu1->id = 24;
        $menu1->name = "Localization";
        $menu1->link="";
        $menu1->parent_id = 21;
        $menu1->save();

        $menu1 = new Menu();
        $menu1->id = 25;
        $menu1->name = "Class Modules";
        $menu1->link="administration/view-module";
        $menu1->parent_id = 21;
        $menu1->save();


        $menu1 = new Menu();
        $menu1->id = 26;
        $menu1->name = "Social Media Authentication";
        $menu1->link="administration/open-id-provider";
        $menu1->parent_id = 21;
        $menu1->save();

        $menu1 = new Menu();
        $menu1->id = 27;
        $menu1->name = "Register OAuth Client";
        $menu1->link="administration/register-auth-client";
        $menu1->parent_id = 21;
        $menu1->save();


        $menu1 = new Menu();
        $menu1->id = 28;
        $menu1->name = "PIM";
        $menu1->link="";
        $menu1->parent_id = 0;
        $menu1->save();

        $menu1 = new Menu();
        $menu1->id = 29;
        $menu1->name = "Configuration";
        $menu1->link="administration/configurePim";
        $menu1->parent_id = 28;
        $menu1->save();

        $menu1 = new Menu();
        $menu1->id = 30;
        $menu1->name = "Optional Fields";
        $menu1->link="";
        $menu1->parent_id = 29;
        $menu1->save();

        $menu1 = new Menu();
        $menu1->id = 31;
        $menu1->name = "Custom Fields";
        $menu1->link="administration/list-CustomFields";
        $menu1->parent_id = 29;
        $menu1->save();


        $menu1 = new Menu();
        $menu1->id = 32;
        $menu1->name = "Reporting Methods";
        $menu1->link="administration/view-reporting-methods";
        $menu1->parent_id = 29;
        $menu1->save();

        $menu1 = new Menu();
        $menu1->id = 33;
        $menu1->name = "Terminal Reason";
        $menu1->link="administration/termination-reason";
        $menu1->parent_id = 29;
        $menu1->save();

        $menu1 = new Menu();
        $menu1->id = 34;
        $menu1->name = "List of Employee";
        $menu1->link="administration/employee";
        $menu1->parent_id = 28;
        $menu1->save();


        $menu1 = new Menu();
        $menu1->id = 35;
        $menu1->name = "Add Employee";
        $menu1->parent_id = 28;
        $menu1->link="administration/employee/create";
        $menu1->save();

        $menu1 = new Menu();
        $menu1->id = 36;
        $menu1->name = "Reports";
        $menu1->link="";
        $menu1->parent_id = 28;
        $menu1->save();

        $menu1 = new Menu();
        $menu1->id = 37;
        $menu1->name = "Recruitment";
        $menu1->link="";
        $menu1->parent_id = 0;
        $menu1->save();

        $menu1 = new Menu();
        $menu1->id = 38;
        $menu1->name = "Query CV";
        $menu1->link="administration/user_cv";
        $menu1->parent_id = 37;
        $menu1->save();

        $menu1 = new Menu();
        $menu1->id = 39;
        $menu1->name = "POST Vacancy";
        $menu1->link="administration/post-jobs";
        $menu1->parent_id = 37;
        $menu1->save();

        $menu1 = new Menu();
        $menu1->id = 40;
        $menu1->name = "Interview";
        $menu1->link="administration/interview";
        $menu1->parent_id = 37;
        $menu1->save();

        $menu1 = new Menu();
        $menu1->id = 41;
        $menu1->name = "Candidate";
        $menu1->link="administration/candidate";
        $menu1->parent_id = 37;
        $menu1->save();


        $menu1 = new Menu();
        $menu1->id = 42;
        $menu1->name = "Leave";
        $menu1->link="";
        $menu1->parent_id = 0;
        $menu1->save();

        $menu1 = new Menu();
        $menu1->id = 43;
        $menu1->name = "My Leave";
        $menu1->link="administration/view-my-leave-list";
        $menu1->parent_id = 42;
        $menu1->save();

        $menu1 = new Menu();
        $menu1->id = 92;
        $menu1->name = "Apply";
        $menu1->link="administration/get-applyLeave";
        $menu1->parent_id = 42;
        $menu1->save();

        $menu1 = new Menu();
        $menu1->id = 94;
        $menu1->name = "Entitlement";
        $menu1->link="administration/add-leave-entitlement";
        $menu1->parent_id = 42;
        $menu1->save();


        

        $menu1 = new Menu();
        $menu1->id = 44;
        $menu1->name = "My Leave";
        $menu1->link="administration/view-my-leave-list";
        $menu1->parent_id = 43;
        $menu1->save();

        $menu1 = new Menu();
        $menu1->id = 45;
        $menu1->name = "Add Entitlement";
        $menu1->link="administration/add-leave-entitlement";
        $menu1->parent_id = 94;
        $menu1->save();

        $menu1 = new Menu();
        $menu1->id = 46;
        $menu1->name = "Employee Entitlement";
        $menu1->link="administration/view-leave-entitlements";
        $menu1->parent_id = 94;
        $menu1->save();

        $menu1 = new Menu();
        $menu1->id = 93;
        $menu1->name = "My Entitlement";
        $menu1->link="administration/view-leave-my-entitlements";
        $menu1->parent_id = 94;
        $menu1->save();


        $menu1 = new Menu();
        $menu1->id = 47;
        $menu1->name = "Report";
        $menu1->link="";
        $menu1->parent_id = 42;
        $menu1->save();


        $menu1 = new Menu();
        $menu1->id = 48;
        $menu1->name = "Leave Entitlement and Usage reports";
        $menu1->link="administration/view-leave-balance-report";
        $menu1->parent_id = 46;
        $menu1->save();

        $menu1 = new Menu();
        $menu1->id = 49;
        $menu1->name = "My Entitlement and Usage Reports";
        $menu1->link="administration/employee-performance-trackers";
        $menu1->parent_id = 46;
        $menu1->save();

        $menu1 = new Menu();
        $menu1->id = 50;
        $menu1->name = "Configure";
        $menu1->parent_id = 42;
        $menu1->save();

        $menu1 = new Menu();
        $menu1->id = 51;
        $menu1->name = "Leave Period";
        $menu1->link="administration/define-leave-period";
        $menu1->parent_id = 50;
        $menu1->save();


        $menu1 = new Menu();
        $menu1->id = 52;
        $menu1->name = "Leave Type";
        $menu1->link="administration/leave-type";
        $menu1->parent_id = 50;
        $menu1->save();


        $menu1 = new Menu();
        $menu1->id = 53;
        $menu1->name = "Work Week";
        $menu1->link="administration/define-workweek";
        $menu1->parent_id = 50;
        $menu1->save();

        $menu1 = new Menu();
        $menu1->id = 54;
        $menu1->name = "Holidays";
        $menu1->link="administration/define-holiday";
        $menu1->parent_id = 50;
        $menu1->save();


        $menu1 = new Menu();
        $menu1->id = 55;
        $menu1->name = "Leave List";
        $menu1->link="administration/define-leave-list";
        $menu1->parent_id = 50;
        $menu1->save();

        $menu1 = new Menu();
        $menu1->id = 56;
        $menu1->name = "Assign Leave";
        $menu1->link="administration/assign-leave";
        $menu1->parent_id = 42;
        $menu1->save();


        $menu1 = new Menu();
        $menu1->id = 57;
        $menu1->name = "Time";
        $menu1->link="";
        $menu1->parent_id = 0;
        $menu1->save();

        $menu1 = new Menu();
        $menu1->id = 58;
        $menu1->name = "Time Sheet";
        $menu1->link="";
        $menu1->parent_id = 56;
        $menu1->save();

        $menu1 = new Menu();
        $menu1->id = 59;
        $menu1->name = "Employee Time sheet";
        $menu1->link="";
        $menu1->parent_id = 57;
        $menu1->save();



        $menu1 = new Menu();
        $menu1->id = 60;
        $menu1->name = "Attendance";
        $menu1->parent_id = 0;
        $menu1->save();

        $menu1 = new Menu();
        $menu1->id = 61;
        $menu1->name = "Employee Record";
        $menu1->link="administration/view-attendance-record";
        $menu1->parent_id = 60;
        $menu1->save();

        $menu1 = new Menu();
        $menu1->id = 62;
        $menu1->name = "Configuration";
        $menu1->link="administration/attendance-configure";
        $menu1->parent_id = 60;
        $menu1->save();

        $menu1 = new Menu();
        $menu1->id = 63;
        $menu1->name = "Report";
        $menu1->link="administration/display-project-report";
        $menu1->parent_id = 56;
        $menu1->save();

        $menu1 = new Menu();
        $menu1->id = 64;
        $menu1->name = "Project Reports";
        $menu1->link="administration/display-employee-report";
        $menu1->parent_id = 63;
        $menu1->save();


        $menu1 = new Menu();
        $menu1->id = 65;
        $menu1->name = "Employee Report";
        $menu1->link="administration/display-attendance-summary-report";
        $menu1->parent_id = 63;
        $menu1->save();


        $menu1 = new Menu();
        $menu1->id = 66;
        $menu1->name = "Attendance Summary";
        $menu1->link="administration/display-attendance-summary-report";
        $menu1->parent_id = 63;
        $menu1->save();

        $menu1 = new Menu();
        $menu1->id = 67;
        $menu1->name = "Project Info";
        $menu1->link="";
        $menu1->parent_id = 63;
        $menu1->save();

        $menu1 = new Menu();
        $menu1->id = 68;
        $menu1->name = "Customer Project ";
        $menu1->link="administration/customer-project";
        $menu1->parent_id = 67;
        $menu1->save();


        $menu1 = new Menu();
        $menu1->id = 69;
        $menu1->name = "Projects";
        $menu1->link="administration/defined-project";
        $menu1->parent_id = 67;
        $menu1->save();

        $menu1 = new Menu();
        $menu1->id = 70;
        $menu1->name = "Performance";
        $menu1->link="";
        $menu1->parent_id = 0;
        $menu1->save();

        $menu1 = new Menu();
        $menu1->id = 71;
        $menu1->name = "Configure";
        $menu1->link="";
        $menu1->parent_id = 70;
        $menu1->save();

        $menu1 = new Menu();
        $menu1->id = 72;
        $menu1->name = "KPI";
        $menu1->link="administration/employee-kpi";
        $menu1->parent_id = 71;
        $menu1->save();

        $menu1 = new Menu();
        $menu1->id = 73;
        $menu1->name = "Tracker";
        $menu1->link="administration/employee-performance-trackers";
        $menu1->parent_id = 71;
        $menu1->save();


        $menu1 = new Menu();
        $menu1->id = 74;
        $menu1->name = "Manage Review";
        $menu1->link="administration/employee-performance-review";
        $menu1->parent_id = 71;
        $menu1->save();


        $menu1 = new Menu();
        $menu1->id = 75;
        $menu1->name = "Manage Reviewer";
        $menu1->link="administration/my-review";
        $menu1->parent_id = 74;
        $menu1->save();


        $menu1 = new Menu();
        $menu1->id = 76;
        $menu1->name = "My Review ";
        $menu1->link="administration/my-review";
        $menu1->parent_id = 74;
        $menu1->save();




        $menu1 = new Menu();
        $menu1->id = 77;
        $menu1->name = "Review List";
        $menu1->link="administration/evaluate-performance-review";
        $menu1->parent_id = 74;
        $menu1->save();


        $menu1 = new Menu();
        $menu1->id = 78;
        $menu1->name = "My Tracker";
        $menu1->link="administration/my-performance-tracker-lis";
        $menu1->parent_id = 70;
        $menu1->save();


        $menu1 = new Menu();
        $menu1->id = 79;
        $menu1->name = "Employee Tracker";
        $menu1->link="administration/employee-trackers";
        $menu1->parent_id = 70;
        $menu1->save();


        $menu1 = new Menu();
        $menu1->id = 80;
        $menu1->name = "Directory";
        $menu1->link="";
        $menu1->parent_id = 0;
        $menu1->save();


        $menu1 = new Menu();
        $menu1->id = 81;
        $menu1->name = "My Info";
        $menu1->link="";
        $menu1->parent_id = 0;
        $menu1->save();

        $menu1 = new Menu();
        $menu1->id = 82;
        $menu1->name = "Personal Details";
        $menu1->link="administration/employee-personal-details";
        $menu1->parent_id = 81;
        $menu1->save();


        $menu1 = new Menu();
        $menu1->id = 83;
        $menu1->name = "Contact Details";
        $menu1->link="administration/employee-contact-details";
        $menu1->parent_id = 81;
        $menu1->save();

        $menu1 = new Menu();
        $menu1->id = 84;
        $menu1->name = "Emergency Contact";
        $menu1->link="administration/employee-emergency-contact";
        $menu1->parent_id = 81;
        $menu1->save();

        $menu1 = new Menu();
        $menu1->id = 85;
        $menu1->name = "Dependents";
        $menu1->link="administration/view-dependents";
        $menu1->parent_id = 81;
        $menu1->save();

        $menu1 = new Menu();
        $menu1->id = 86;
        $menu1->name = "Immigration";
        $menu1->link="administration/view-immigration";
        $menu1->parent_id = 81;
        $menu1->save();

        $menu1 = new Menu();
        $menu1->id = 87;
        $menu1->name = "Job ";
        $menu1->link="administration/employee-job";
        $menu1->parent_id = 81;
        $menu1->save();


        $menu1 = new Menu();
        $menu1->id = 88;
        $menu1->name = "Salary ";
        $menu1->link="administration/employee-salary";
        $menu1->parent_id = 81;
        $menu1->save();


        $menu1 = new Menu();
        $menu1->id = 89;
        $menu1->name = "Report To";
        $menu1->link="administration/view-ReportTo-details";
        $menu1->parent_id = 81;
        $menu1->save();

        $menu1 = new Menu();
        $menu1->id = 90;
        $menu1->name = "Qualification";
        $menu1->link="administration/employee-qualification'";
        $menu1->parent_id = 81;
        $menu1->save();

        $menu1 = new Menu();
        $menu1->id = 91;
        $menu1->name = "Membership";
        $menu1->link="administration/view-membership";
        $menu1->parent_id = 81;
        $menu1->save();

    }
}
