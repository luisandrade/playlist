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

    Route::group(['middleware'=>['guest']],function(){
        Route::get('/','Auth\LoginController@mostrarLogin');
        Route::post('/login', 'Auth\LoginController@login')->name('login');
     });

     Route::group(['middleware'=>['auth']],function(){

            Route::get('/main', function () {
                return view('pages-blank');
            })->name('main');

    
         Route::group(['middleware' => ['Administrador']], function () {
            //Users
            Route::get('/usuarios/selectUsuarios', 'UsuarioController@selectUsuarios');
            // Canales
            route::get('/canales','CanalController@index')->name('canales');
            route::post('/canales/registrar','CanalController@store')->name('canales/registrar');
            Route::get('/canales/selectCanales', 'CanalController@selectCanales');
            // Videos
            route::get('/videos','VideoController@index')->name('videos');
            route::get('/videos/listarVideos','VideoController@listarVideo')->name('listarVideos');
            route::post('/videos/registrar','VideoController@store')->name('videos/registrar');
            //Playlist
            route::get('/playlist','PlaylistController@index')->name('playlist');
            route::post('/playlist/registrar','PlaylistController@store')->name('playlist/registrar');
        });
    });
//Defecto
Route::get('{any}', 'VeltrixController@index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
