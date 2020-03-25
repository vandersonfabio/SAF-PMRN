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
    return view('auth/login');    
});

Auth::routes();

Route::group(['middleware'=>['auth']], function(){

    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('unidade', 'UnidadeController');
    Route::resource('modelo', 'ModeloController');
    Route::resource('proprietario', 'ProprietarioController');
    Route::resource('viatura', 'ViaturaController');
});

Route::get('/logout', 'Auth\LoginController@logout')->name('logout'); 
