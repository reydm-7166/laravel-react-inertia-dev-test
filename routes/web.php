<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Post;
use Symfony\Component\HttpFoundation\Request;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

Route::middleware(['auth', 'verified', 'checktime'])->group(function () {
    Route::withoutMiddleware('checktime')->get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');


    Route::get('/feed', [PostController::class, 'index'])
        ->name('post.index'); //->middleware('checktime')

    Route::get('/@{username}/{slug}', [PostController::class, 'show'])
        ->name('post.show');

    Route::get('/feed/create', [PostController::class, 'create'])
        ->name('post.create');

    Route::post('/feed/create', [PostController::class, 'store'])
        ->name('post.store');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
