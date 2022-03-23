<?php

use App\Http\Controllers\SeriesController;
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

Route::get('/series', 'App\Http\Controllers\SeriesController@index')->name('listar_series');
Route::get('/', 'App\Http\Controllers\SeriesController@index')->name('listar_series');
Route::get('/series/create', 'App\Http\Controllers\SeriesController@create')->name('criar_serie');
Route::post('/series/store', 'App\Http\Controllers\SeriesController@store')->name('inserir_serie');
Route::post('/series/excluir/{id}', 'App\Http\Controllers\SeriesController@excluir')->name('excluir_serie');
Route::post('/series/{id}/editaNome', 'App\Http\Controllers\SeriesController@editaNome');

Route::get('/series/{serieid}/temporadas','App\Http\Controllers\TemporadasController@index');

Route::get('/temporadas/{temporada}/episodios','App\Http\Controllers\EpisodiosController@index');

Route::post('/temporadas/{temporada}/episodios/assistir','App\Http\Controllers\EpisodiosController@assistir');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
