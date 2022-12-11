<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\topic\ArchiveController;
use App\Http\Controllers\topic\DetailController;
use App\Http\Controllers\topic\EditController;
use App\Http\Controllers\topic\CreateController;
use App\Http\Controllers\LikeController;
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
    Route::post('/detail/{id}', [DetailController::class, 'answer']);
    Route::get('/delete/{comment_id}', [DetailController::class, 'delete_comment'])->name('comment.delete');

    Route::post('like/{id}', [LikeController::class, 'store']);
    Route::post('unlike/{id}', [LikeController::class, 'destroy']);

    Route::get('/edit/{id}', [EditController::class, 'get'])->name('topic.edit');
    Route::post('/edit/{id}', [EditController::class, 'edit']);
    Route::get('/delete/{id}', [EditController::class, 'delete'])->name('topic.delete');

    Route::get('/create', [CreateController::class, 'get'])->name('topic.create');
    Route::post('/create', [CreateController::class, 'create']);
});

Auth::routes();