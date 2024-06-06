<?php

use App\Http\Controllers\FallbackController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('home', [], 302);
});

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/user/{username}', [ProfileController::class, 'index'])->name('user');

    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/ask', [QuestionController::class, 'index'])->name('ask');
    Route::post('/ask', [QuestionController::class, 'create'])->name('ask.create');
    Route::get('/question/{id}', [QuestionController::class, 'show'])->name('question.show');
    Route::post('/question/{id}', [QuestionController::class, 'answer']);
    
    Route::delete('/question/{id}', [QuestionController::class, 'deleteQuestion']);
    Route::delete('/answer/{id}', [QuestionController::class, 'deleteAnswer']);
    
    Route::get('/notification', [NotificationController::class, 'show'])->name('notification');
    Route::get('/search', [SearchController::class, 'index'])->name('search.index');
    Route::get('/search/{show}', [SearchController::class, 'search'])->name('search.show');
});

Route::fallback([FallbackController::class, 'index'])->name('fallback');

require __DIR__.'/auth.php';
