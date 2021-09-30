<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TrainerController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentClassController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\MovieCategoryController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\MailController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/trainer-list', [TrainerController::class, 'search']);
Route::get('/trainer-csv', [TrainerController::class, 'csv']);

Route::get('/student-list', [StudentController::class, 'search']);
Route::get('/student-csv', [StudentController::class, 'csv']);

Route::get('/movie-list', [MovieController::class, 'search']);

Route::get('/course-data', [CourseController::class, 'editData']);
Route::get('/course-list', [CourseController::class, 'search']);

Route::get('/mail-list', [MailController::class, 'search']);
Route::get('/mailList-csv', [MailController::class, 'csv']);
Route::get('/mailListDetail-csv', [MailController::class, 'detailCsv']);

Route::get('/class-list', [StudentClassController::class, 'list']);
Route::get('/movie-category-list', [MovieCategoryController::class, 'list']);
Route::get('/club-list', [ClubController::class, 'list']);