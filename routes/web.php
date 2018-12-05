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

use Illuminate\Support\Facades\Auth;

//Route::get('/home', 'FrontendController@index')->name('home');

Route::prefix('admin')->group(function() {
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
//    Route::post('/login-admin', 'Auth\AdminLoginController@loginAdmin')->name('admin.login');

});

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', function () {
    return redirect('kh-works');
});
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
//Route::post('hr-register','Auth\AdminLoginController@HrRegister');
/************************************************************************************
 *                                  Backend routes
 ************************************************************************************/
//'middleware' => ['guest:admins']]



Route::get('/administration' ,'Backend\BackendController@index')->name('admin');

Route::post('/register/admin', 'Auth\AdminRegister@create')->name('register.admin');

Route::group(['namespace' => 'Backend', 'prefix' => 'administration'], function ($request) {


        Route::resource('candidate', 'CandidateController');
        Route::resource('companyProfile', 'CompanyController');
        Route::resource('vacancy', 'VacanciesController');
        Route::resource('jobs-title','JobTitleController');
        Route::resource('jobs-category','JobCategoryController');
        Route::resource('post-jobs','JobController');
        Route::resource('employee','EmployeeController');
        Route::resource('interview','InterviewController');
        Route::post('accepts','CandidateController@accepts');
        Route::resource('Cv','CvController');
        Route::delete('ajax-remove-image/{filename}', 'EmployeeController@deleteImage');
        Route::match(['get', 'post'], 'ajax-image-upload', 'EmployeeController@ajaxImage');

});



/************************************************************************************
 *                                  Frontend routes
 ************************************************************************************/

Route::group(['namespace' => 'Frontend','prefix'=>'kh-works'], function () {
    Route::resource('post-resume','ResumeController');
    Route::get('/user/resume-pdf','ResumeController@export_pdf');
    Route::get('/posts', 'KhWorksController@posts');
    Route::post('/apply/{id}/{user_id}', 'KhWorksController@apply');
    Route::post('/getExistingCandidate/{job_id}/{user_id}', 'KhWorksController@getExistingCandidate');
    Route::resource('jobs', 'JobController');
    Route::resource('user_cv','UsersCvController');
    Route::get('/search','KhWorksController@scopeSearch');
    Route::get('/lists', 'KhWorksController@lists');
    Route::get('/policy', 'KhWorksController@policy');
    Route::get('/resume','KhWorksController@resume');
});
/************************************************************************************
 *                                  Frontend routes
 ************************************************************************************/

Route::get('/kh-works', 'Frontend\KhWorksController@index')->name('home');
//Route::post('registers', 'RegisterController@store');