<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MisbarPageController;

Route::get('/', [MisbarPageController::class, 'register'])->name('home');
Route::get('/register', [MisbarPageController::class, 'register'])->name('register');
Route::redirect('/signup', '/register')->name('signup');
Route::get('/login', [MisbarPageController::class, 'login'])->name('login');
Route::get('/workspace', [MisbarPageController::class, 'workspace'])->defaults('unit', 'brain')->name('workspace');

Route::get('/workspace/brain', [MisbarPageController::class, 'workspace'])->defaults('unit', 'brain')->name('workspace.brain');
Route::get('/workspace/brand-dna', [MisbarPageController::class, 'workspace'])->defaults('unit', 'brand')->name('brand-dna.edit');
Route::get('/workspace/market-radar', [MisbarPageController::class, 'workspace'])->defaults('unit', 'radar_audience')->name('market-radar.index');
Route::get('/workspace/competitors', [MisbarPageController::class, 'workspace'])->defaults('unit', 'competitors')->name('workspace.competitors');
Route::get('/workspace/strategy', [MisbarPageController::class, 'workspace'])->defaults('unit', 'strategy')->name('workspace.strategy');
Route::get('/workspace/content/create', [MisbarPageController::class, 'workspace'])->defaults('unit', 'studio')->name('content.create');
Route::get('/workspace/content/calendar', [MisbarPageController::class, 'workspace'])->defaults('unit', 'planner')->name('content.calendar');
Route::get('/workspace/analytics', [MisbarPageController::class, 'workspace'])->defaults('unit', 'analytics')->name('analytics.dashboard');
Route::get('/workspace/voice-rescue', [MisbarPageController::class, 'workspace'])->defaults('unit', 'voice_rescue')->name('voice-rescue.index');
Route::get('/workspace/admin', [MisbarPageController::class, 'workspace'])->defaults('unit', 'admin')->name('workspace.admin');
