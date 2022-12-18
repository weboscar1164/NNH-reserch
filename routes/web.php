<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\topic\ArchiveController;
use App\Http\Controllers\topic\DetailController;
use App\Http\Controllers\topic\EditController;
use App\Http\Controllers\topic\CreateController;
use App\Http\Controllers\CommentController;
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



Route::get('/', [HomeController::class, 'get'])->name('home');
Route::get('/detail/{topic}', [DetailController::class, 'get'])->name('topic.detail');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/create', [CreateController::class, 'get'])->name('topic.create');
    Route::post('/create', [CreateController::class, 'create']);

    Route::get('/archive', [ArchiveController::class, 'get'])->name('topic.archive');


    Route::post('/comment/{topic}', [CommentController::class, 'store'])->name('comment.store');
    Route::get('/comment/delete/{comment}', [CommentController::class, 'delete'])->name('comment.delete');

    Route::post('like/{topic}', [LikeController::class, 'store']);
    Route::post('unlike/{topic}', [LikeController::class, 'destroy']);

    Route::group(['middleware' => 'can:edit,topic'], function () {
        Route::get('/edit/{topic}', [EditController::class, 'get'])->name('topic.edit');
        Route::post('/edit/{topic}', [EditController::class, 'edit']);
        Route::get('/topic/delete/{topic}', [EditController::class, 'delete'])->name('topic.delete');
    });
});

Auth::routes();