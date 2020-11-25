<?php

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::get('/', function(){
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/welcome-mail', 'MailController@sendWelcomeMail')->name('welcome-mail');

Route::get('/ver-deportes', 'Followed_SportController@seeSports')->name('ver-deportes');

Route::get('/agregar-deportes', 'Followed_SportController@checkUnfollowedSports')->name('agregar-deportes');

Route::post('/agregar', 'Followed_SportController@addSports');

Route::get('/eliminar-deportes', 'Followed_SportController@checkFollowedSports')->name('eliminar-deportes');

Route::post('/eliminar', 'Followed_SportController@deleteSports');

Route::get('/elegir-noticias', 'NewsController@chooseNewsType')->name('elegir-noticias');

Route::get('/mis-noticias', 'NewsController@newsIFollow')->name('mis-noticias');

Route::get('/todas-las-noticias', 'NewsController@allNews')->name('todas-las-noticias');

Route::post('/leer-noticia', 'NewsController@showNews');

Route::get('/ver-calendario', 'MatchController@showMatches')->name('ver-calendario');

Route::get('/partidos-pasados', 'MatchController@showPastMatches')->name('partidos-pasados');

Route::post('/ver-partido', 'MatchController@showMatch');

Route::post('/prediccion', 'MatchController@storePrediction');

Route::get('/perfil', 'UserController@showProfile')->name('perfil');

Route::post('/check-upload', 'UserController@store');

Route::post('/deporte','SportController@showSport');