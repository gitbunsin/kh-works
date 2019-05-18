<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/home', 'FrontendController@index')->name('home');


//    Route::post('/login-admin', 'Auth\AdminLoginController@loginAdmin')->name('admin.login');



//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});

Route::get('/', function () {
    return redirect('kh-works');
});
Auth::routes();
Route::get('/verifyemail/{token}','\App\Http\Controllers\Auth\RegisterController@verify');

Route::get('/organization/verify/{token}','\App\Http\Controllers\Auth\AdminRegister@verify');

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::post('/login-admin', '\App\Http\Controllers\Auth\AdminLoginController@login')->name('admin.login.submit');
Route::post('login', 'Auth\LoginController@login')->name('login');
//Route::post('hr-register','Auth\AdminLoginController@HrRegister');
/************************************************************************************
 *                                  Backend routes
 ************************************************************************************/
//'middleware' => ['guest:admins']]


Route::get('/administration' ,'Backend\BackendController@index')->name('admin');

Route::post('/register/admin', 'Auth\AdminRegister@create')->name('register.admin');

Route::group(['namespace' => 'Backend', 'prefix' => 'administration'], function ($request) {
        Route::get('/login/{company_name}/{token}','EmployeeController@loginEmployee')->name('employee.login.view');
        Route::post('/employee-login','EmployeeController@EmployeeLogin')->name('employee.login');
        Route::resource('user', 'UserController');
        //Route::resource('userRole', 'UserRoleController');
        Route::resource('candidate', 'CandidateController');
//        Route::post('/candidate-approved/{candidate_id}','CandidateController@approved');
//        Route::post('/candidate-reject/{candidate_id}','CandidateController@reject');
        Route::resource('pay-grade', 'PayGradeController');
        Route::get('/paygrade/{id}', 'PayGradeController@getRelationPayGradeCurrency');
        Route::post('/remove-currency-pay', 'PayGradeController@destroyPaygradeCurrency');
        Route::post('/add-currency-pay', 'PayGradeController@AddPayGradeCurrency');
        Route::resource('work-shift', 'WorkShiftController');
        Route::resource('employment-status', 'EmploymentStatusController');
        Route::resource('companyProfile', 'CompanyController');
        Route::resource('user_cv','UsersCvController');
//        Route::resource('vacancy', 'VacanciesController');


       Route::get('candidate-shortlist/{id}','CandidateController@CandidateShortlist');
       Route::post('Update-Candidate-Shortlist/{candidate_id}/{vacancy_id}','CandidateController@UpdateCandidateShortlist');


       Route::get('candidate-Schedule-Interview/{id}','CandidateController@CandidateScheduleInterview');
       Route::post('update-Schedule-Interview/{candidate_id}/{vacancy_id}','CandidateController@UpdateCandidateScheduleInterview');

        //
      Route::resource('Dashboard','DashboardController');


      Route::resource('list-all-staff-directory','DirectoryController');


      //Interview Pass
        Route::get('Candidate-Interview-Pass/{id}','InterviewController@CandidateInterviewPass');
        Route::post('Update-Candidate-Interview-Pass/{candidate_id}/{vacancy_id}','InterviewController@UpdateCandidateInterviewPass');


        //Job Offer
        Route::get('Candidate-Offer-Job/{id}','InterviewController@CandidateOfferJob');
        Route::post('Candidate-Offer-Job/{candidate_id}/{vacancy_id}','InterviewController@UpdateCandidateOfferJob');



        Route::get('Candidate-decline-Job/{id}','InterviewController@CandidateDeclineJob');
        Route::post('Candidate-decline-Job/{candidate_id}/{vacancy_id}','InterviewController@UpdateCandidateDeclineJob');


        Route::get('Candidate-hire-Job/{id}','InterviewController@CandidateHireJob');
        Route::post('Candidate-hire-Job/{candidate_id}/{vacancy_id}','InterviewController@UpdateCandidateHireJob');


       Route::get('candidate-reject/{id}','InterviewController@CandidateReject');
       Route::post('candidate-reject/{candidate_id}/{vacancy_id}','InterviewController@UpdateCandidateReject');



       Route::get('CandidateRejectList/{id}','CandidateController@CandidateRejectList');
       Route::post('CandidateRejectList/{candidate_id}/{vacancy_id}','CandidateController@UpdateCandidateRejectList');




        Route::get('Candidate-Interview-Fail/{id}','InterviewController@CandidateInterviewFail');
        Route::post('Update-Candidate-Interview-Fail/{candidate_id}/{vacancy_id}','InterviewController@UpdateCandidateInterviewFail');
//        Route::post('Apply-Vacancy',)


    Route::resource('jobs-title','JobTitleController');
        Route::resource('jobs-category','JobCategoryController');
        Route::resource('post-jobs','JobController');
        Route::get('/display-job-details/{job_id}/{company_id}','JobController@DisplayVacancy');
        Route::resource('employee','EmployeeController');
        Route::get('/employee-job','EmployeeController@GetJob');
        Route::post('/update-employee-job/{id}','EmployeeController@UpdateEmployeeJob');
        Route::post('/employee-terminate','EmployeeController@EmployeeTerminate');
        Route::get('/employee-terminate/{id}','EmployeeController@EmployeeTerminateEdit');
        Route::post('/employee-terminate/{id}','EmployeeController@EmployeeTerminateReason');
//        Route::post('/employee-terminate/{id}','EmployeeController@EmployeeTerminateReasonDelete');
        Route::post('/employee-terminate-delete/{id}','EmployeeController@EmployeeTerminateReasonDelete');


    Route::post('/apply-job/{VacancyID}/{OrganizationCode}', 'JobController@ApplyVacancy');



    //Route::get('/employee-salary','EmployeeController@getSalary');

        Route::resource('employee-salary','EmployeeBasicSalaryController');
        Route::get('/employee-report-to','EmployeeController@getReport');
        Route::get('/employee-personal-details','EmployeeController@EmployeeInfo');
        Route::resource('employee-contact-details','EmployeeContactController');
        Route::resource('employee-work-experience','EmployeeWorkExperienceController');
        Route::resource('employee-work-skills','EmployeeSkillsController');
        Route::resource('skills','SkillController');
        Route::resource('education','EducationController');
        Route::resource('employee-education','EmployeeEducationController');
        Route::resource('license-types','LicenseController');
        Route::resource('employee-license','EmployeeLicenseController');
        Route::resource('membership','MembershipController');
        Route::resource('employee-qualification','QualificationController');
        Route::resource('language','LanguageController');
        Route::resource('employee-language','EmployeeLanguageController');
        Route::resource('nationality','NationalityController');
        Route::resource('locations','LocationController');
        Route::resource('termination-reason','TerminationReasonController');
        Route::resource('employee-kpi','KpiController');
        Route::resource('employee-performance-trackers','PerformanceTrackerController');

        Route::get('employee-trackers','PerformanceTrackerController@employeeTracker');
        Route::get('my-performance-tracker-list','PerformanceTrackerController@viewMyPerformanceTrackerList');

        Route::get('employee/tracker/{id}', 'PerformanceTrackerController@getEmployeeNoTrakerEmp');
        Route::resource('employee-performance-review','PerformanceReviewController');
        Route::resource('performance-tracker-log','PerformanceTrackerLogController');


        Route::get('evaluate-performance-review','PerformanceReviewController@EvaluatePerformancReview');
        Route::get('employee/tracker/review/{id}','PerformanceReviewController@getEmployeeTrackerReview');
        Route::get('my-review','PerformanceReviewController@getMyReviewPerformance');


        //Leave
        Route::resource('leave-type','LeaveTypeController');
        Route::resource('define-leave-period','LeavePeriodController');

        Route::post('add-leave-period','LeavePeriodController@listLeavePeriod');
        Route::resource('define-holiday','HolidayController');


        Route::resource('define-workweek','WorkWeekController');
        Route::resource('define-leave-list','LeaveController');


        Route::get('get-applyLeave','LeaveController@applyLeave');
        Route::post('leave-request','LeaveController@leaveRequest');

        Route::get('getAllEmployeeMatch/{id}','LeaveEntitlementController@searchEmployeeMatch');

        Route::get('assign-leave','LeaveController@AssignLeave');
        Route::get('request-leave-balance/{id}','LeaveController@requestLeaveBalance');

        Route::get('/display-leave-details','LeaveController@DisplayLeaveDetails');

        Route::resource('leave-adjustment','LeaveAdjustmentController');

        Route::get('view-leave-balance-report','LeaveController@viewLeaveBalanceReport');


        Route::get('view-my-leave-list','LeaveController@viewMyLeaveList');

        Route::get('leave-comment/{id}','LeaveController@leaveComment');
        Route::post('leave-comment/{id}','LeaveController@EmployeeLeaveComment');
        Route::post('leave-approve/{id}','LeaveController@EmployeeLeaveApprove');
        Route::get('leave-approve/{id}','LeaveController@leaveApprove');
        Route::get('leave-reject/{id}','LeaveController@leaveReject');

        Route::resource('add-leave-entitlement','LeaveEntitlementController');




        Route::get('view-leave-my-entitlements','LeaveEntitlementController@viewMyLeaveEntitlements');
        Route::get('view-leave-entitlements','LeaveEntitlementController@viewLeaveEntitlements');
        Route::get('addLeaveEntitlement','LeaveEntitlementController@addEmployeeLeaveEntitlment');

        //PIM
        Route::resource('list-CustomFields','CustomFieldController');
        Route::get('configurePim','CustomFieldController@ConfigurePim');
        Route::resource('list-Mail-Configuration','MailConfigurationController');
        Route::resource('view-Email-Notification','EmailNotificationController');
        Route::resource('register-auth-client','AuthClientController');




        //Employee
        Route::resource('view-dependents','DependentsController');
        Route::resource('view-ReportTo-details','EmployeeReportController');
        Route::get('employee/report/{report_id}/{method_id}/{employee_id}','EmployeeReportController@ShowEmployeeReport');
        Route::resource('view-immigration','ImmigrationController');
        Route::resource('view-membership','EmployeeMembershipController');

        Route::resource('employee-time-sheets','EmployeeTimeSheetController');
       // Route::get('viewMatchEmployee','LeaveAdjustmentController@viewMatchEmployee');

        Route::resource('view-Directory','DirectoryController');
        //Time
        Route::resource('customer-project','CustomerController');

        Route::resource('defined-project','ProjectController');
        Route::resource('view-attendance-record','AttendanceController');
        Route::get('attendance-configure','AttendanceController@AttendanceConfigure');
        Route::Resource('display-project-report','ProjectReportController');
        Route::get('display-attendance-summary-report','EmployeeReportController@displayAttendanceSummaryReport');
        Route::Resource('display-employee-report','EmployeeReportController');

        //Admin
        Route::resource('view-module','ModuleController');
        Route::post('view-module-update','ModuleController@ModuleUpdate');

        Route::resource('open-id-provider','OpenIdProviderController');


        Route::resource('view-company-structure','SubUnitController');

        //PIM
        Route::resource('view-reporting-methods','ReportingMethodsController');

        //PayRoll
         Route::resource('view-payroll','PayrollController');
//         Route::get('search-payroll-employee','PayrollController@SearchEmpPayroll');
         Route::get('transaction/pdf/{id}','PayrollController@getPdf');
         Route::resource('list-all-staff-payroll','PayrollController');


//        Route::resource('employee-skills',)
//        Route::get('/employee-emergency/{emergency_id}','EmployeeController@EditEmergencyContact');
//        Route::post('/employee-emergency-update/{emergency_id}','EmployeeController@UpdateEmergencyContact');
        Route::post('/update-interview-date/{id}', 'InterviewController@UpdateCandidateInterviewDate');
        Route::post('/update-interview-time/{id}', 'InterviewController@UpdateCandidateInterviewTime');
        Route::post('/update-interview-note/{id}', 'InterviewController@UpdateCandidateInterviewNote');
        Route::resource('employee-emergency-contact','EmployeeEmergencyContactController');
        Route::resource('interview','InterviewController');
        Route::post('/pass-interview/{candidate_id}','InterviewController@passInterview');
        Route::post('/fail-interview/{candidate_id}','InterviewController@failInterview');
        Route::resource('CandidateAttachment','UsersCvController');
        Route::get('/download/{user_id}', 'UsersCvController@getDownload');

});



/************************************************************************************
 *                                  Frontend routes
 ************************************************************************************/

Route::group(['namespace' => 'Frontend','prefix'=>'kh-works'], function () {

    Route::resource('post-resume','ResumeController');
    Route::get('/user/resume-pdf','ResumeController@export_pdf');
    Route::get('/posts', 'KhWorksController@posts');
    Route::get('/search','KhWorksController@scopeSearch');
    Route::get('/policy', 'KhWorksController@policy');
    Route::get('/resume','ResumeController@resume')->middleware('isClient');
    Route::post('/apply/{id}/{user_id}', 'KhWorksController@apply')->middleware('auth');
    Route::get('/lists', 'KhWorksController@lists')->middleware('auth');



});



/************************************************************************************
 *                                  Frontend routes
 ************************************************************************************/

Route::get('/kh-works', 'Frontend\KhWorksController@index')->name('home');
//Route::post('registers', 'RegisterController@store');