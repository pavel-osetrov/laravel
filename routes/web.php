<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Запрещение доступа к группе маршрутов для пользователей, не прошедших аутентификацию
Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    });
    Route::get('account', function () {
        return view('account');
    });
});


// Добавление префикса к группе маршрутов
Route::prefix('dashboard')->group(function () {
    Route::get('/', function () {
        // Обрабатывает путь dashboard
    });
    
    Route::get('users', function () {
        // Обрабатывает путь /dashboard/users
    });
});


// Запасные маршруты
Route::fallback(function () {
    //
});

// Поддоменная маршрутизация
Route::domain('{account}.myapp.com')->group(function () {
   Route::get('/', function ($account) {
      // 
   });
   
   Route::get('users/{id}', function ($account, $id) {
       //
   });
});

// Префиксы пространства имен для групп маршрутов

// App\Http\Controllers\UsersController
Route::get('/', 'UsersController@index');

// App\Http\Controllers\Dashboard\PurchasesController
Route:namespase('Dashboard')->group(function  () {
    
    Route::get('dashboard/purchases', 'PurchasesController@index');
});