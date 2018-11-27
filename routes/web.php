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


//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', function () {
    return redirect('kh-works');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::post('hr-register','\App\Http\Controllers\Auth\RegisterController@HrRegister');
/************************************************************************************
 *                                  Backend routes
 ************************************************************************************/
//Route::group(['middleware' => ['auth', 'web']], function() {
//    // uses 'auth' middleware plus all middleware from $middlewareGroups['web']
//    Route::resource('blog','BlogController'); //Make a CRUD controller
//
//});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/administration' ,'Backend\BackendController@index');
});

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

  //Route::delete('ajax-remove-image/{filename}', 'EmployeeController@deleteImage');

/************************************************************************************
 *                                  Frontend routes
 ************************************************************************************/

Route::group(['namespace' => 'Frontend','prefix'=>'kh-works'], function () {
    Route::get('/posts', 'KhWorksController@posts');
    Route::get('/apply-job/{id}/user_id/{user_id}', 'KhWorksController@applyJobs');
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

Route::get('/kh-works', 'Frontend\KhWorksController@index');
//Route::post('registers', 'RegisterController@store');