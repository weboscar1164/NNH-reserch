<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\topic\ArchiveController;
use App\Http\Controllers\topic\DetailController;
use App\Http\Controllers\topic\EditController;
use App\Http\Controllers\topic\CreateController;
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



Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [HomeController::class, 'get'])->name('home');
    Route::get('/archive', [ArchiveController::class, 'get'])->name('topic.archive');
    Route::get('/detail/{id}', [DetailController::class, 'get'])->name('topic.detail');
    Route::get('/edit', [EditController::class, 'get'])->name('topic.edit');
    Route::get('/create', [CreateController::class, 'get'])->name('topic.create');
    Route::post('/create', [CreateController::class, 'create']);
});

Auth::routes();