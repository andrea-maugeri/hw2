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

Route::get('/', function () {
    return view('home_unlogged');
});

Route::get('login',"App\Http\Controllers\LoginController@index")->name('login');
Route::post('login/checkData',"App\Http\Controllers\LoginController@checkData")->name('login/checkData');

Route::post('signup',"App\Http\Controllers\SignupController@signup");
Route::post('signup/checkUser',"App\Http\Controllers\SignupController@checkUser");

Route::get('/home',"App\Http\Controllers\HomeController@index")->name('home');
Route::get('/home/fill',"App\Http\Controllers\HomeController@fill");
Route::post('home/checkFavorites',"App\Http\Controllers\HomeController@checkFavorites");
Route::post('home/addFavorites',"App\Http\Controllers\HomeController@addFavorites");

Route::get('favorite',"App\Http\Controllers\FavoriteController@index")->name('favorite');
Route::get('favorite/fill',"App\Http\Controllers\FavoriteController@fill");
Route::post('favorite/delete',"App\Http\Controllers\FavoriteController@delete");

Route::get('search',"App\Http\Controllers\SearchController@index")->name('search');

Route::get('logout',function(){
    Session::flush();
    return redirect('login');
})->name('logout');

