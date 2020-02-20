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

//====СПОСОБЫ ОПРЕДЕЛЕНИЯ МАРШРУТОВ===

// Замыкание
Route::get('/closure', function () {
    return view('welcome');
});

// Контроллер@метод
Route::get('/controller', 'WelcomeController@index');



//=======КОМАНДЫ МАРШРУТОВ===========

Route::post('/', function () {
    // обслуживает кого-то выполняющего POST на этот маршрут
});

Route::put('/', function () {
    // обслуживает кого-то выполняющего PUT на этот маршрут
});

Route::delete('/', function () {
    // обслуживает кого-то выполняющего DELETE на этот маршрут
});

Route::any('/', function () {
    // обслуживает кого-то выполняющего ANY на этот маршрут
});

Route::match(['get', 'post'], '/', function () {
    // обслуживает кого-то выполняющего GET или POST по этому маршруту
});



//=========ПАРАМЕТРЫ МАРШРУТОВ============

Route::get('/users/{id}/friends', function($id) {
    //обязательный параметр
});

Route::get('/users/{id?}', function($id = 'fallbackId') {
    // необязательный параметр
});

// Наложение на маршрут ограничений с помощью регулярных выражений
Route::get('/user/{id}', function ($id) {
    //
})->where('id', '[0-9]+');


Route::get('/user/{username}', function ($username) {
    //
})->where('id', '[A-Za-z]+');


Route::get('posts/{id}/{slug}', function ($id, $slug) {
    // 
})->where(['id' => '[0-9]+', 'slug' => '[A-Za-z]+']);



//========ИМЕНА МАРШРУТОВ===================
Route::get('members/{id}', 'MembersController@show')->name('members.show');


// Соглашение в именовании маршрутов
/*
 * составное имя
 * название ресурса во множественном числе
 * точку
 * наименование действия
 */

/*
 * photos.index
 * photos.create
 * photos.store
 * photos.show
 * photos.edit
 * photos.update
 * photos.destroy
 */

// ссылаться на маршруты лучше с помощью хелпера route('photos.index')