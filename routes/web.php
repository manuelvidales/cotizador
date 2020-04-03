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

Route::group(['prefix' => config('permission.prefix'),'middleware'=>['role:admin','role:manager']], function () {
    Permission::routes();

});

Route::group(['middleware'=>['role:admin','role:manager','role:user']],function(){

Route::get('/archivos', 'CotizaexcelController@subirarchivo')->name('subirarchivos');
Route::get('/mostrararchivos', 'CotizaexcelController@mostrararchivos')->name('mostrararchivos');
Route::post('/filesend', 'CotizaexcelController@guardararchivo')->name('filesave');
Route::get('/cotizar', 'CotizaexcelController@index')->name('cotizar');
Route::post('/cotizador', 'CotizaexcelController@calcular')->name('cotizarexcel');
Route::get('/files/{id}', 'CotizaexcelController@show')->name('verarchivos');
Route::get('/removefile/{id}', 'CotizaexcelController@destroy')->name('eliminaarchivo');

});
