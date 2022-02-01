<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
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

Auth::routes();

Route::view('/', 'index');

//Route::group(['middleware' => 'auth', 'prefix' => 'post'], function () {
//    Route::get('/create', [UserPosts::class, 'create'])->name('post.create');
//    Route::post('/', [UserPosts::class, 'store'])->name('post.store');
//    Route::post('/', [UserPosts::class, 'store'])->name('post.store');
//});

Route::group(['prefix' => 'profile'], function () {
    Route::get('/{user}', [ProfileController::class, 'index'])->name('profile.show');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/{user}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/{user}', [ProfileController::class, 'update'])->name('profile.update');
    });
});
Route::resource('posts', PostController::class, [
    'middleware' => 'auth',
    'names' => [
        'create' => 'post.create',
        'store' => 'post.store',
        'show' => 'post.show',
        'edit' => 'post.edit',
        'update' => 'post.update',
        'destroy' => 'post.destroy',
    ],
]);
