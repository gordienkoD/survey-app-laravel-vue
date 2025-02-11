<?php

use App\Http\Controllers\{
    AdminController,
    DashboardController,
    GoogleAuthController,
    ProfileController,
    SurveyController
};
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin'      => Route::has('login'),
        'canRegister'   => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion'    => PHP_VERSION,
    ]);
});

Route::get('/auth/google/redirect', [GoogleAuthController::class, 'redirect'])->name('auth.google.redirect');
Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback'])->name('auth.google.callback');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::prefix('survey')->name('survey.')->group(function () {
        Route::get('/', [SurveyController::class, 'show'])->name('show');
        Route::post('/', [SurveyController::class, 'store'])->name('store');
        Route::get('/stats', [SurveyController::class, 'stats'])->name('stats');
    });

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/missing-surveys', [AdminController::class, 'missingSurveys'])->name('missing-surveys');
    });

    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });
});

// Подключаем маршруты аутентификации
require __DIR__ . '/auth.php';
