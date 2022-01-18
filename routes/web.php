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
    return redirect()->route('home');
});

Auth::routes();

Route::get('/inicio', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/inicio/set-cookie/{value}', [App\Http\Controllers\HomeController::class, 'setCookie'])->name('home.cookie');
Route::get('/inicio/get-cookie', [App\Http\Controllers\HomeController::class, 'getCookie'])->name('home.get_cookie');

Route::post('/admin/save-image', [App\Http\Controllers\ImageController::class, 'save'])->name('image.save');
Route::post('/admin/update-image', [App\Http\Controllers\ImageController::class, 'update'])->name('image.update');
Route::get('/admin/delete-image/{id}', [App\Http\Controllers\ImageController::class, 'delete'])->name('image.delete');
Route::get('/admin/get-image/{filename}', [App\Http\Controllers\ImageController::class, 'get'])->name('image.get');
Route::get('/admin/get-image-random', [App\Http\Controllers\ImageController::class, 'getImage'])->name('image.get_image');

Route::post('/admin/save-event', [App\Http\Controllers\EventController::class, 'save'])->name('event.save');
Route::post('/admin/update-event', [App\Http\Controllers\EventController::class, 'update'])->name('event.update');
Route::get('/admin/delete-event/{id}', [App\Http\Controllers\EventController::class, 'delete'])->name('event.delete');
Route::get('/admin/get-event-image/{filename}', [App\Http\Controllers\EventController::class, 'get'])->name('event.get_image');
Route::get('/get-events/{year}', [App\Http\Controllers\EventController::class, 'getEvents'])->name('events.get');

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
Route::get('/admin/images', [App\Http\Controllers\AdminController::class, 'getImages'])->name('admin.images');
Route::get('/admin/events', [App\Http\Controllers\AdminController::class, 'getEvents'])->name('admin.events');

Route::post('/admin/create-master-key', [App\Http\Controllers\MasterKeyController::class, 'save'])->name('masterkey.save');
Route::post('/admin/match-master-key', [App\Http\Controllers\MasterKeyController::class, 'match'])->name('masterkey.match');
Route::get('/admin/generate-master-key', [App\Http\Controllers\MasterKeyController::class, 'generate'])->name('masterkey.generate');
