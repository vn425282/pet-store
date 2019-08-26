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

/* general */
Route::get('/', 'PetController@index')->name('helloworld');

/* pet */
Route::post('pet/autocreate', 'PetController@createPetByType')->name('create_pet_auto');
Route::get('pet/get/{petStatus}', 'PetController@getPetByStatus')->name('get_pet_by_status');

/* report */
Route::get('report/occupancy', 'ReportController@getOccupancyReport')->name('get_occupancy_report');




