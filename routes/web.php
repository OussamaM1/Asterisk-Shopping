<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LigneController;
use Illuminate\Support\Facades\Request;
use App\Article;
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


Route::resource('/articles','ArticleController')->only('index','show');
Route::resource('/clients','ClientController');
Route::resource('/lignes','LigneController')->only('index','destroy','store','create','edit');
Auth::routes();

Route::any('/search',function(){
    $q = Request::input('q');
    $articles = Article::where('titre','LIKE','%'.$q.'%')->orWhere('categorie','LIKE','%'.$q.'%')->get();
    if(count($articles) > 0)
        return view('search',['articles'=>$articles,'query'=>$q]);
    else return view ('search',['message'=>'Pas de résultats pour la requête','query'=>$q]);
})->name('search');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/lignes/delete', function () {
    $articleId = intval($_GET['articleId']);
    $helper= new LigneController();
    $helper->deleteCookieElement($articleId);
    return redirect('/lignes');
})->name('deleteElement');
Route::post('/lignes/update', function () {
    $articleId = $_POST['articleId'];
    $newQuantity = $_POST['articleQuantity'];
    $helper= new LigneController();
    $helper->updateCookieElement($articleId,$newQuantity);
    return redirect('/lignes');
})->name('updateElement');

Route::resource('/commandes','CommandeController')->only('update','edit','index');

Route::get('/', function () {
    $articles = App\Article::inRandomOrder()->take(6)->get();
        return view('welcome')->with('articles',$articles);
})->name('welcome');