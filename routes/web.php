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
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'homeCtrl@index')->name('home');//display home page
Route::post('submitSched', 'homeCtrl@store');//insert date
Route::get('/profile', 'profileCtrl@index')->name('profile');//display profile
Route::get('/calMgmt', 'calMgmtCtrl@index')->name('calMgmt');//Display of Schedules on OED
Route::put('delete', 'calMgmtCtrl@edit')->name('log.delete');//delete event(just updating the status on log_input table to delete)
Route::put('update', 'calMgmtCtrl@update')->name('event.update');//update event
Route::get('/reqStatus', 'reqstatusCtrl@index')->name('reqStatus');//Display of Schedules on PIAD and PND

Route::get('/moaList', 'moaCtrl@index')->name('moaList');
Route::post('submit', 'moaCtrl@store');//insert MOA
Route::put('editMoa', 'moaCtrl@update')->name('moa.update');//update MOA
Route::put('deleteMoa', 'moaCtrl@destroy')->name('moa.delete');//delete MOA


Route::get('/activeMoa', 'moaCtrl@index', function () {
    return view('moa');
});
Route::get('/twoMonthsMoa', 'moaCtrl@index', function () {
    return view('moa');
});
Route::get('/oneMonthMoa', 'moaCtrl@index', function () {
    return view('moa');
});
Route::get('/expiredMoa', 'moaCtrl@index', function () {
    return view('moa');
});