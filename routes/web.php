
<?php

use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\MisbarPageController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\BrandProfileAIController;
use App\Http\Controllers\BrandProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Demo Routes
|--------------------------------------------------------------------------
*/

Route::redirect('/', '/workspace/brand-profile')
    ->name('home');
    Route::redirect('/login', '/workspace/brand-profile');

Route::view('/registration-notice', 'auth.registration-notice')
    ->name('registration.notice');

Route::get('/email/confirm/{id}/{hash}', [EmailVerificationController::class, 'verify'])
    ->middleware(['signed', 'throttle:6,1'])
    ->name('misbar.verification.verify');

/*
|--------------------------------------------------------------------------
| Disabled Registration and Login
|--------------------------------------------------------------------------
*/

// Route::get('/register', [MisbarPageController::class, 'register'])->name('register');
// Route::redirect('/signup', '/register')->name('signup');
// Route::get('/login', [MisbarPageController::class, 'login'])->name('login');

/*
|--------------------------------------------------------------------------
| Public Brand Profile Demo
|--------------------------------------------------------------------------
*/

Route::get('/workspace/brand-profile', [BrandProfileController::class, 'show'])
    ->name('brand-profile.edit');

Route::post('/workspace/brand-profile/analyze', [BrandProfileAIController::class, 'analyze'])
    ->middleware('throttle:10,1')
    ->name('brand-profile.analyze');

Route::post(
    '/workspace/brand-profile/sections/{section}/approve',
    [BrandProfileController::class, 'approve']
)
    ->middleware('throttle:20,1')
    ->name('brand-profile.sections.approve');

/*
|--------------------------------------------------------------------------
| Public Brand DNA Presentation
|--------------------------------------------------------------------------
*/

Route::get('/workspace/brand-dna', [MisbarPageController::class, 'workspace'])
    ->defaults('unit', 'brand')
    ->name('brand-dna.edit');

/*
|--------------------------------------------------------------------------
| Protected Workspace Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/workspace', [MisbarPageController::class, 'workspace'])
        ->defaults('unit', 'brain')
        ->name('workspace');

    Route::get('/workspace/brain', [MisbarPageController::class, 'workspace'])
        ->defaults('unit', 'brain')
        ->name('workspace.brain');

    Route::post('/workspace/brand-dna', [BrandController::class, 'storeOrUpdate'])
        ->name('brand-dna.save');

    Route::post('/workspace/brand-dna/generate', [BrandController::class, 'generate'])
        ->name('brand-dna.generate');

    Route::get('/workspace/market-radar', [MisbarPageController::class, 'workspace'])
        ->defaults('unit', 'radar_audience')
        ->name('market-radar.index');

    Route::get('/workspace/competitors', [MisbarPageController::class, 'workspace'])
        ->defaults('unit', 'competitors')
        ->name('workspace.competitors');

    Route::get('/workspace/strategy', [MisbarPageController::class, 'workspace'])
        ->defaults('unit', 'strategy')
        ->name('workspace.strategy');

    Route::get('/workspace/content/create', [MisbarPageController::class, 'workspace'])
        ->defaults('unit', 'studio')
        ->name('content.create');

    Route::get('/workspace/content/calendar', [MisbarPageController::class, 'workspace'])
        ->defaults('unit', 'planner')
        ->name('content.calendar');

    Route::get('/workspace/analytics', [MisbarPageController::class, 'workspace'])
        ->defaults('unit', 'analytics')
        ->name('analytics.dashboard');

    Route::get('/workspace/voice-rescue', [MisbarPageController::class, 'workspace'])
        ->defaults('unit', 'voice_rescue')
        ->name('voice-rescue.index');

    Route::get('/workspace/admin', [MisbarPageController::class, 'workspace'])
        ->defaults('unit', 'admin')
        ->name('workspace.admin');
});
