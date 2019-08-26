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
    return view('index');
});


// Canales
route::get('/canales','CanalController@index')->name('canales');
route::post('/canales/registrar','CanalController@store')->name('canales/registrar');

// Videos
route::get('/videos','VideoController@index')->name('videos');
route::get('/videos/listarVideos','VideoController@listarVideo')->name('listarVideos');
route::post('/videos/registrar','VideoController@store')->name('videos/registrar');

//Plylist
route::get('/playlist','PlaylistController@index')->name('playlist');
route::post('/playlist/registrar','PlaylistController@store')->name('playlist/registrar');

Route::get('{any}', 'VeltrixController@index');

Route::group(['prefix' => 'admin'], function(){
    

    Route::group(['prefix' => 'heroes'], function(){
        Route::get('/','AdminController@index');
        Route::get('pages-blank','HeroeController@index')->name('pages-blank');
        Route::get('create','HeroeController@create')->name('admin.heroes.create');
        Route::post('store','HeroeController@store')->name('admin.heroes.store');
        Route::get('edit/{id}','HeroeController@edit')->name('admin.heroes.edit');
        Route::post('update/{id}','HeroeController@update')->name('admin.heroes.update');
    });

    Route::get('enemigos','EnemigoController@index')->name('admin.enemigos');
    Route::get('items','ItemsController@index')->name('admin.items');
});