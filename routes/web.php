<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController; 
use App\Http\Controllers\ThreadController; 
use App\Http\Controllers\ReplyController;
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
Route::middleware('auth')->group(function () {
    
    Route::get('/posts/create', [PostController::class, 'create']);
    
    Route::get('/posts/{post}', [PostController::class ,'show']);
    // '/posts/{対象データのID}'にGetリクエストが来たら、PostControllerのshowメソッドを実行する
    
    Route::get('/', [PostController::class, 'index']);
    
    Route::post('/posts', [PostController::class, 'store']);
    
    Route::get('/posts/{post}/edit', [PostController::class, 'edit']);
    
    Route::put('/posts/{post}', [PostController::class, 'update']);
    
    Route::delete('/posts/{post}', [PostController::class,'delete']);
    
    Route::get('/', [ThreadController::class, 'index'])->name('index');
    
    Route::get('/threads/create', [ThreadController::class, 'create']);
    
    Route::get('/threads/{thread}', [ThreadController::class ,'show'])->name('threads.show');
    
    Route::post('/threads', [ThreadController::class, 'store']);
     
    Route::put('/threads/{thread}', [ThreadController::class, 'update']);
    
    Route::delete('/threas/{thread}', [ThreadController::class,'delete']);
    
    Route::post('/replys', [ReplyController::class, 'store']);
    
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
