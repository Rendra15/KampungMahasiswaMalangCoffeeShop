<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;

use App\Http\Controllers\CoffeeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/welcome', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');

Route::post('/coffee/{id}/rating', [CoffeeController::class, 'storeRating'])->name('coffee.rating');

Route::get('/Menu-Coffee', function () {
    return view('Coffee');
});

Route::get('/Login', function () {
    return view('Login');
});

Route::get('/Menu-NonCoffee', function () {
    return view('NonCoffee');
});

Route::get('/ModernDrink', function () {
    return view('ModernDrink');
});

Route::get('/TraditionalDrink', function () {
    return view('TraditionalDrink');
});

Route::get('/Food', function () {
    return view('Food');
});

Route::get('/Snack', function () {
    return view('Snack');
});

Route::get('/dbcon', function (){
    return view('dbcon');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
