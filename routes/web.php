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

Route::resource('dashboard/tripulante', 'dashboard\TripulanteController');
Route::resource('dashboard/incidencia', 'dashboard\IncidenciaController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/incidencia/{incidencia}/resolve', 'dashboard\IncidenciaController@resolve')->name('incidencia.resolve');
Route::post('/incidencia/store_nota', 'dashboard\NotaController@store')->name('nota.store');
Route::delete('/incidencia/destroy_nota/{id}', 'dashboard\NotaController@destroy')->name('nota.destroy');
Route::post('/incidencia/store_mensaje', 'dashboard\MensajeIncidenciaController@store')->name('mensajeincidencia.store');