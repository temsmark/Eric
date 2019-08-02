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

Route::get('/', function () {
return redirect('login');

});
Route::get('logout', function () {
    \Illuminate\Support\Facades\Session::flush();
    Auth::logout();
   return redirect('login');

});

Auth::routes(['register'=>false]);

Route::get('/home', 'HomeController@index')->name('home');



// ADMIN
Route::get('dashboard','AdminController@index');
Route::post('user','AdminController@store');
Route::get('user/{id}','AdminController@destroy');




/// Doctor
Route::get('doctor','DoctorController@index');
Route::post('details','DoctorController@store');
Route::get('doctor/patients','DoctorController@all');
Route::get('refer/{id}','DoctorController@refer');
Route::post('refer','DoctorController@refers');



///Specialist
Route::get('specialist','SpecialistController@index');