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
        Route::get('/login/{company_name}/{token}','EmployeeController@loginEmployee')->middleware('isEmployee');
        Route::post('/employee-login','EmployeeController@EmployeeLogin');
        Route::resource('user', 'UserController');
        Route::resource('userRole', 'UserRoleController');
        Route::resource('candidate', 'CandidateController');
        Route::post('/candidate-approved/{candidate_id}','CandidateController@approved');
        Route::post('/candidate-reject/{candidate_id}','CandidateController@reject');
        Route::resource('pay-grade', 'PayGradeController');
        Route::get('/paygrade/{id}', 'PayGradeController@getRelationPayGradeCurrency');
        Route::post('/remove-currency-pay', 'PayGradeController@destroyPaygradeCurrency');
        Route::post('/add-currency-pay', 'PayGradeController@AddPayGradeCurrency');
        Route::resource('work-shift', 'WorkShiftController');
        Route::resource('employment-status', 'EmploymentStatusController');
        Route::resource('companyProfile', 'CompanyController');
        Route::resource('user_cv','UsersCvController');
        Route::resource('vacancy', 'VacanciesController');
        Route::resource('jobs-title','JobTitleController');
        Route::resource('jobs-category','JobCategoryController');
        Route::resource('post-jobs','JobController');
        Route::get('/display-job-details/{job_id}/{company_id}','JobController@displayJob');
        Route::resource('employee','EmployeeController');
        Route::get('/employee-job','EmployeeController@getJob');
        Route::get('/employee-salary','EmployeeController@getSalary');
        Route::get('/employee-report-to','EmployeeController@getReport');
        Route::get('/employee-personal-details','EmployeeController@EmployeeInfo');
        Route::get('/employee-contact-details','EmployeeController@EmployeeContactDetails');
        Route::resource('employee-work-experience','EmployeeWorkExperienceController');
        Route::resource('employee-work-skills','EmployeeSkillsController');
        Route::resource('skills','SkillController');
        Route::resource('education','EducationController');
        Route::resource('employee-education','EmployeeEducationController');
        Route::resource('license-types','LicenseTypeController');
        Route::resource('license','LicenseController');
        Route::resource('membership','MembershipController');
        Route::resource('employee-qualification','QualificationController');
        Route::resource('language','LanguageController');
        Route::post('/employee-language','LanguageController@addLanguage');
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
        Route::resource('define-holiday','HolidayController');
        Route::resource('define-workweek','WorkWeekController');
        Route::resource('define-leave-list','LeaveController');
        Route::get('assign-leave','LeaveController@assginLeave');
        Route::get('request-leave-balance/{id}','LeaveController@requestLeaveBalance');
        Route::resource('leave-adjustment','LeaveAdjustmentController');

        Route::get('view-leave-balance-report','LeaveController@viewLeaveBalanceReport');
        Route::get('view-leave-entitlements','LeaveAdjustmentController@viewLeaveEntitlements');


        //Employee
        Route::resource('view-dependents','DependentsController');


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






//        Route::resource('employee-skills',)
//        Route::get('/employee-emergency/{emergency_id}','EmployeeController@EditEmergencyContact');
//        Route::post('/employee-emergency-update/{emergency_id}','EmployeeController@UpdateEmergencyContact');
        Route::post('/update-user', 'InterviewController@updateUser');
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
    Route::post('/apply-job/{id}', 'JobApply@apply')->middleware('auth');



});



/************************************************************************************
 *                                  Frontend routes
 ************************************************************************************/

Route::get('/kh-works', 'Frontend\KhWorksController@index')->name('home');
//Route::post('registers', 'RegisterController@store');