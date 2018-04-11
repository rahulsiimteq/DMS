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


//index page route
Route::get('/', function () {
    return view('index');
});

//
// Route::get('/lock', function () {
//     return view('lock');
// });

//patient register page route
Route::get('/patient/register','PatientController@index');


//patient checkup
Route::get('/patient/checkup', 'PatientDetailsController@index');


//patientresource controller
Route::resource('Patient','PatientController');

//patient details controller
Route::resource('PatientDetails','PatientDetailsController');

//patient history page routes
Route::get('/patient/history','PatientHistoryController@index');

Route::resource('Appointment','AppointmentController');

Route::get('/patient/appointment','AppointmentController@index');

// Authentication Route
Auth::routes();

//Home Controller route
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('users', 'UserController');

Route::resource('roles', 'RoleController');

Route::resource('permissions', 'PermissionController');

Route::resource('posts', 'PostController');
