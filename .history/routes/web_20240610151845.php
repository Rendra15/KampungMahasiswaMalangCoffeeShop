<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;

use App\Http\Controllers\CoffeeController;
use App\Http\Controllers\NonCoffeeController;
use App\Http\Controllers\ModernDrinkController;
use App\Http\Controllers\TraditionalDrinkController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\SnackController;

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

Route::post('/Menu-Coffee/{id}/rating', [CoffeeController::class, 'storeRating'])->middleware('auth');
Route::post('/Menu-NonCoffee/{id}/rating', [NonCoffeeController::class, 'storeRating'])->middleware('auth');
Route::post('/Menu-ModernDrink/{id}/rating', [ModernDrinkController::class, 'storeRating'])->middleware('auth');
Route::post('/Menu-TraditionalDrink/{id}/rating', [TraditionalDrinkController::class, 'storeRating'])->middleware('auth');
Route::post('/Menu-Food/{id}/rating', [FoodController::class, 'storeRating'])->middleware('auth');
Route::post('/Menu-Snack/{id}/rating', [SnackController::class, 'storeRating'])->middleware('auth');

Route::get('/Menu-Coffee/{coffeeId}/rating', [CoffeeController::class, 'getRating']);
Route::get('/Menu-NonCoffee/{NoncoffeeId}/rating', [NonCoffeeController::class, 'getRating']);
Route::get('/Menu-ModernDrink/{ModernDrinkId}/rating', [ModernDrinkController::class, 'getRating']);
Route::get('/Menu-TraditionalDrink/{TraditionalDrinkId}/rating', [TraditionalDrinkController::class, 'getRating']);
Route::get('/Menu-Food/{FoodId}/rating', [FoodController::class, 'getRating']);
Route::get('/Menu-Snack/{coffeeId}/rating', [SnackController::class, 'getRating']);


Route::get('/Menu-Coffee', function () {
    return view('Coffee');
});

Route::get('/Login', function () {
    return view('Login');
});

Route::get('/Menu-NonCoffee', function () {
    return view('NonCoffee');
});

Route::get('/Menu-ModernDrink', function () {
    return view('ModernDrink');
});

Route::get('/Menu-TraditionalDrink', function () {
    return view('TraditionalDrink');
});

Route::get('/Menu-Food', function () {
    return view('Food');
});

Route::get('/Menu-Snack', function () {
    return view('Snack');
});

Route::get('/dbcon', function (){
    return view('dbcon');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
