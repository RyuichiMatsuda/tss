<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// incidents
Route::get('incidents/detail/{id}', 'App\Http\Controllers\IncidentController@detail')->name('incidents.detail');
Route::post('incidents/store', 'App\Http\Controllers\IncidentController@store')->name('incidents.store');
Route::get('incidents', 'App\Http\Controllers\IncidentController@index')->name('incidents.index');
Route::get('incidents/new', 'App\Http\Controllers\IncidentController@new')->name('incidents.new');


// Route::get('incidents/edit', 'App\Http\Controllers\IncidentController@edit')->name('incidents.edit');
// Route::post('incidents/destroy', 'App\Http\Controllers\IncidentController@destroy')->name('incidents.destroy');
// Route::post('incidents/update', 'App\Http\Controllers\IncidentController@update')->name('incidents.update');



