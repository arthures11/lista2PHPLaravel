<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\User;
use App\Models\Tests;
use Illuminate\Support\Facades\Hash;


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

Route::group(['namespace' => 'App\Http\Controllers'], function()
{
    /**
     * Home Routes
     */
    Route::get('/', 'HomeController@index')->name('home.index');

    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
        Route::get('/testy', 'HomeController@testy')->name('home.testy');
        Route::get('/test/{id}', 'HomeController@test')->name('home.test');
        Route::post('/sprawdzOdpowiedzi', 'HomeController@sprawdzOdpowiedzi')->name('sprawdzOdpowiedzi');


    });

    Route::group(['middleware' => ['nauczyciel:nauczyciel']], function() {
        /**
         * Logout Routes
         */

        Route::get('/uczniowie', 'HomeController@uczniowie')->name('home.uczniowie');
        Route::get('/addtest', 'HomeController@addtest')->name('home.addtest');
        Route::get('/pytania', 'HomeController@pytania')->name('home.bazapytan');
        Route::post('/uczniowie', [UserController::class, 'register'])->name('users.register');
        Route::post('/pytania', [\App\Http\Controllers\question_databaseController::class, 'add'])->name('pytania.add');
        Route::post('/addtest', [\App\Http\Controllers\TestController::class, 'add'])->name('addtest.add');




    });

    Route::get('/users/edit', 'UserController@edit')
        ->middleware('NauczycielMiddleware:nauczyciel');
    Route::delete('/uczniowie/{id}','UserController@delete')->name('uczniowie.delete');

    Route::put('/uczniowie/{id}', 'UserController@update')->name('uczniowie.update');
    Route::put('/pytania/{id}', 'question_databaseController@update')->name('pytania.update');
    Route::delete('/pytania/{id}','question_databaseController@delete')->name('pytania.delete');


});
