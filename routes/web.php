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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/layouts/trang1','App\Http\Controllers\ViduLayoutController@trang1');

Route::get('/','App\Http\Controllers\ViduLayoutController@sach');
Route::get('/sach/theloai/{id}','App\Http\Controllers\ViduLayoutController@theloai');
Route::get('/sach/detail/{id}','App\Http\Controllers\ViduLayoutController@detail');


Route::get('/sach/detail/{id}','App\Http\Controllers\ViduLayoutController@detail');

Route::get('/ten','App\Http\Controllers\ViDuController@ten');
Route::get('/inten','App\Http\Controllers\ViduController@inten');

Route::get('/accountpanel','App\Http\Controllers\AccountController@accountpanel')
->middleware('auth')->name("account");
Route::get('/booklist','App\Http\Controllers\AccountController@booklist')
->middleware('auth')->name("booklist");
Route::post('/saveaccountinfo','App\Http\Controllers\AccountController@saveaccountinfo')
->middleware('auth')->name('saveinfo');
Route::get('/bookcreate','App\Http\Controllers\AccountController@bookcreate')
->middleware('auth')->name('bookcreate');
Route::post('/addbook','App\Http\Controllers\AccountController@addbook')
->middleware('auth')->name('addbook');
Route::post('/bookdelete','App\Http\Controllers\AccountController@bookdelete')
->middleware('auth')->name('bookdelete');
Route::get('/bookedit/{id}','App\Http\Controllers\AccountController@bookedit')
->middleware('auth')->name('bookedit');
Route::post('/edit','App\Http\Controllers\AccountController@edit')
->middleware('auth')->name('edit');

Route::get('/order','App\Http\Controllers\ViduLayoutController@order')->name('order');
Route::post('/cart/add','App\Http\Controllers\ViduLayoutController@cartadd')->name('cartadd');

Route::post('/cart/delete','App\Http\Controllers\ViduLayoutController@cartdelete')->name('cartdelete');
Route::post('/order/create','App\Http\Controllers\ViduLayoutController@ordercreate')
->middleware('auth')->name('ordercreate');

Route::post('/bookview','App\Http\Controllers\ViduLayoutController@bookview')->name("bookview");

Route::get('/testemail/{id_don_hang}','App\Http\Controllers\ViduLayoutController@testemail')->name("testemail");
require __DIR__.'/auth.php';
