<?php

use App\Http\Controllers\StreamersController;
use GhostZero\TmiCluster\Facades\TmiCluster;
use Illuminate\Support\Facades\Route;

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


Route::prefix('streamers')->group(function () {
    Route::get('/', [StreamersController::class, 'viewStreamers'])->name('streamers.index');
    Route::get('/create', [StreamersController::class, 'viewCreateStreamer'])->name('streamers.create');
    Route::post('/create', [StreamersController::class, 'postStreamer'])->name('streamers.post');

    Route::prefix('/{streamerId}/messages')->group(function () {
        Route::get('/', [\App\Http\Controllers\MessagesController::class, 'viewMessages'])->name('messages.show');
    });
});

TmiCluster::routes();
