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
    return view('home');
    //return redirect('register2');
});

Route::get('register', "RegisterController@index")->name('register');
//Route::get('register',[RegisterController::class, 'index'])->name('register.index');
//Route::get('register', 'RegisterController@index')->name('register');
//Route::get('register', 'App\Http\Controllers\RegisterController@index');
Route::post('register', 'RegisterController@register');

Route::get('logout', 'LoginController@logout');
Route::get('login', 'LoginController@index');
Route::post('login', 'LoginController@login');

Route::get("home", function(){
    return view('home');
});
Route::get("openingCocktail", "CocktailController@openingCocktail");
Route::get("mettiTogliLike/{idCocktail}", "LikeController@mettiTogliLike");
Route::get("preferiti","LikeController@index");
Route::get("ritornaPreferiti","LikeController@ritornaPreferiti");
Route::get("filtra/{filtro}","CocktailController@filtra");

//Route::get('register/email/{email}', 'RegisterController@checkEmail');

//Route::get('home', 'HomeController@index');