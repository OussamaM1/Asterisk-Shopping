<?php

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

Route::get('/', function () {
    $articles = App\Article::inRandomOrder()->take(6)->get();
        return view('welcome')->with('articles',$articles);
})->name('welcome');
Route::resource('/articles','ArticleController');
Route::resource('/clients','ClientController');
Route::resource('/commandes','CommandeController');
Route::resource('/lignes','LigneController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
