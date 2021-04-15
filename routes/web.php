<?php

use Illuminate\Support\Facades\Auth;
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

//Rutas para el controlador de los hoteles
Route::get('/Hoteles','HotelController@index')->name('hoteles.index');
Route::get('/Hoteles/create','HotelController@create')->name('hoteles.create');
Route::post('/Hoteles','HotelController@store')->name('hoteles.store');
Route::get('/Hoteles/{hotel}','HotelController@show')->name('hoteles.show');
Route::get('/Hoteles/edit/{hotel}','HotelController@edit')->name('hoteles.edit');
Route::put('/Hoteles/{hotel}','HotelController@update')->name('hoteles.update');
Route::delete('/Hoteles/{hotel}','HotelController@destroy')->name('hoteles.destroy');

//Rutas para el controlador de las habitaciones
Route::get('/Hoteles/Habitaciones/{hotel}','HabitacionController@index')->name('habitaciones.index');
Route::get('/Habitaciones/create/{hotel}','HabitacionController@create')->name('habitaciones.create');
Route::post('/Habitaciones','HabitacionController@store')->name('habitaciones.store');
Route::get('/Habitaciones/{habitaciones}','HabitacionController@show')->name('habitaciones.show');
Route::get('/Hoteles/Habitaciones/edit/{hotel}','HabitacionController@edit')->name('habitaciones.edit');
Route::put('/Hoteles/Habitaciones/{hotel}','HabitacionController@update')->name('habitaciones.update');
Route::delete('/Hoteles/Habitaciones/{habitacion}','HabitacionController@destroy')->name('habitaciones.destroy');

//Rutas para el controlador de perfiles
Route::get('/Perfiles/{perfil}','PerfilController@show')->name('perfiles.show');
Route::get('/Perfiles/edit/{perfil}','PerfilController@edit')->name('perfiles.edit');
Route::put('/Perfiles/{perfil}','HotelController@update')->name('perfiles.update');

Auth::routes();

