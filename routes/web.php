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

Route::get('/', 'PagesController@index')->name('home');
Route::get('/home', 'PagesController@index')->name('home');
Route::get('/horaire', 'PagesController@horaire');
Route::get('/contact', 'PagesController@contact');
Route::get('/tarifs', 'PagesController@tarifs');
Route::get('/galerie', 'PagesController@galerie');

Route::get('/Admin', function() {
    return view('Admin.dashboard');
})->middleware('admin');

Auth::routes();

Route::resource('/Admin/Articles', 'ArticlesController')->middleware('admin');
Route::resource('/Admin/Utilisateurs', 'UtilisateursController')->middleware('admin');

Route::patch('Admin/Utilisateurs/', 'UtilisateursController@update')->middleware('admin');

Route::resource('ajax-crud', 'ArticlesController');
Route::post('ajax-crud/update', 'ArticlesController@update')->name('ajax-crud.update');

Route::get('Admin/ajax-crud/destroy/{id}', 'ArticlesController@destroy');
