
<?php

use App\Http\Controllers\EmailVerificationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MisbarPageController;





Route::view('/registration-notice', 'auth.registration-notice')
    ->name('registration.notice');
Route::get('/email/confirm/{id}/{hash}', [EmailVerificationController::class, 'verify'])
    ->middleware(['signed', 'throttle:6,1'])
    ->name('misbar.verification.verify');
/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [MisbarPageController::class, 'register'])
    ->name('home');

Route::get('/register', [MisbarPageController::class, 'register'])
    ->name('register');

Route::redirect('/signup', '/register')
    ->name('signup');

Route::get('/login', [MisbarPageController::class, 'login'])
    ->name('login');


/*
|--------------------------------------------------------------------------
| Protected Workspace Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {

    // Main workspace
    Route::get('/workspace', [MisbarPageController::class, 'workspace'])
        ->defaults('unit', 'brain')
        ->name('workspace');

    // Brain
    Route::get('/workspace/brain', [MisbarPageController::class, 'workspace'])
        ->defaults('unit', 'brain')
        ->name('workspace.brain');

    // Brand DNA
    Route::get('/workspace/brand-dna', [MisbarPageController::class, 'workspace'])
        ->defaults('unit', 'brand')
        ->name('brand-dna.edit');

    // Market Radar
    Route::get('/workspace/market-radar', [MisbarPageController::class, 'workspace'])
        ->defaults('unit', 'radar_audience')
        ->name('market-radar.index');

    // Competitors
    Route::get('/workspace/competitors', [MisbarPageController::class, 'workspace'])
        ->defaults('unit', 'competitors')
        ->name('workspace.competitors');

    // Strategy
    Route::get('/workspace/strategy', [MisbarPageController::class, 'workspace'])
        ->defaults('unit', 'strategy')
        ->name('workspace.strategy');

    // Content Studio
    Route::get('/workspace/content/create', [MisbarPageController::class, 'workspace'])
        ->defaults('unit', 'studio')
        ->name('content.create');

    // Content Calendar
    Route::get('/workspace/content/calendar', [MisbarPageController::class, 'workspace'])
        ->defaults('unit', 'planner')
        ->name('content.calendar');

    // Analytics
    Route::get('/workspace/analytics', [MisbarPageController::class, 'workspace'])
        ->defaults('unit', 'analytics')
        ->name('analytics.dashboard');

    // Voice Rescue
    Route::get('/workspace/voice-rescue', [MisbarPageController::class, 'workspace'])
        ->defaults('unit', 'voice_rescue')
        ->name('voice-rescue.index');

    // Admin
    Route::get('/workspace/admin', [MisbarPageController::class, 'workspace'])
        ->defaults('unit', 'admin')
        ->name('workspace.admin');

});
