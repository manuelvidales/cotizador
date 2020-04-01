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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'HomeController@index');

Auth::routes();
Route::get('/archivos', 'CotizaexcelController@subirarchivo')->name('subirarchivos');
Route::post('/filesend', 'CotizaexcelController@guardararchivo')->name('filesave');
Route::get('/cotizar', 'CotizaexcelController@index')->name('cotizar');
Route::post('/cotizador', 'CotizaexcelController@calcular')->name('cotizarexcel');
