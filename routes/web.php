<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\SupportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\View;

Route::view('/', 'page.home')->name('home');
Route::view('/about', 'page.home')->name('about');
Route::view('/stats', 'page.stats')->name('stats');

// DONATE

Route::view('/donate', 'page.donate', [
    'page' => 'donate',
    'title' => 'Способы поддержки сервера SocialCraft',
    'description' => 'Благодаря вашей помощи на проекте проводятся ивенты, поддерживаются режимы и разрабатываются новые.',
    ]
)->name('donate');
Route::view('/donate/success', 'page.donate-success')->name('donate.success');

//Route::get('/rules', [DocsController::class, 'show'])
//    ->name('rules');


Route::redirect('/rules', '/docs/rules', 301);
Route::get('/docs/{page?}', [DocsController::class, 'show'])
    ->name('docs');

/*
|--------------------------------------------------------------------------
| Support
|--------------------------------------------------------------------------
|
*/
Route::get('/privacy', [SupportController::class, 'privacy'])
    ->name('support.privacy');
Route::get('/terms', [SupportController::class, 'terms']) // terms of use
    ->name('support.terms');

/*
|--------------------------------------------------------------------------
| Profile Routes
|--------------------------------------------------------------------------
|
| TODO
|
*/
Route::get('/u/{user:nickname}', [ProfileController::class, 'show'])
    ->name('profile');
