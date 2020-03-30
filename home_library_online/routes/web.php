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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'AdminUserController@index')->name('admin_home')->middleware('can:Admin');
Route::get('/admin/librarian', 'AdminUserController@index')->name('admin_home')->middleware('can:Librarian');

Route::post('/books', 'BookController@store')->name('book_save');
Route::get('/books/create', 'BookController@create')->name('book_create')->middleware('can:Librarian');
Route::get('/books/list', 'BookController@index')->name('book_list')->middleware('auth');
Route::get('/books/orders', 'RentBookController@index')->name('book_orders');
Route::get('/books/{book}', 'BookController@show')->name('book_show');
Route::post('/books/{book}', 'BookController@rent')->name('book_rent');

Route::put('admin/{id}', 'AdminUserController@update')->name('update_status');
Route::put('admin/role/{id}', 'AdminUserController@updateUserRole')->name('update_role');