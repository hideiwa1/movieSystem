<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\CourceController;


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

Route::get('/', [CourceController::class, 'index'])
    ->middleware('auth:trainers,admins')
    ->name('index');

Route::middleware('auth:trainers')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware('auth:admins')->group(function () {
    Route::get('/trainer-add', [RegisteredUserController::class, 'create'])
    ->name('register');
});

Route::post('/trainer-add', [RegisteredUserController::class, 'store'])
    ->middleware('auth:admins');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest');

Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
    ->middleware('guest')
    ->name('password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware('guest')
    ->name('password.email');

Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
    ->middleware('guest')
    ->name('password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.update');

Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
    ->middleware('auth')
    ->name('verification.notice');

Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
    ->middleware(['auth', 'signed', 'throttle:6,1'])
    ->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.send');

Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
    ->middleware('auth')
    ->name('password.confirm');

Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
    ->middleware('auth');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth:trainers')
    ->name('logout');

Route::get('/trainer-detail/{id}', [TrainerController::class, 'show'])
    ->middleware('auth:trainers,admins')
    ->name('trainer.detail');

Route::get('/trainer-edit/{id?}', [TrainerController::class, 'edit'])
    ->middleware('auth:trainers,admins')
    ->name('trainer.edit');

Route::post('/trainer-edit', [TrainerController::class, 'update'])
    ->middleware('auth:trainers,admins')
    ->name('trainer.update');

Route::get('/trainer-list/{id?}', [TrainerController::class, 'list'])
    ->middleware('auth:trainers,admins')
    ->name('trainer.list');

Route::get('/student-detail/{id}', [StudentController::class, 'show'])
    ->middleware('auth:trainers,admins')
    ->name('student.detail');

Route::get('/student-edit/{id?}', [StudentController::class, 'edit'])
    ->middleware('auth:trainers,admins')
    ->name('student.edit');

Route::post('/student-edit', [StudentController::class, 'update'])
    ->middleware('auth:trainers,admins')
    ->name('student.update');

Route::get('/student-list', [StudentController::class, 'list'])
    ->middleware('auth:trainers,admins')
    ->name('student.list');

Route::get('/mail', [MailController::class, 'show'])
    ->middleware('auth:trainers,admins')
    ->name('mail.show');

Route::post('/mail', [MailController::class, 'select'])
    ->middleware('auth:trainers,admins')
    ->name('mail.select');

Route::post('/mail-send', [MailController::class, 'send'])
    ->middleware('auth:trainers,admins')
    ->name('mail.send');

Route::get('/movie-edit/{id?}', [MovieController::class, 'edit'])
    ->middleware('auth:trainers,admins')
    ->name('movie.edit');

Route::post('/movie-edit', [MovieController::class, 'update'])
    ->middleware('auth:trainers,admins')
    ->name('movie.update');
