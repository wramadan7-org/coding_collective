<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\EducationController;
use App\Http\Controllers\Api\ExperienceController;
use App\Http\Controllers\Api\SkillController;
use App\Http\Controllers\Api\Auth\AuthController;

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

Route::controller(AuthController::class)->group(function () {
    Route::post('register', 'register');
    Route::post('login', 'login');
});

Route::middleware('auth:sanctum')->group( function () {
    Route::resource('roles', RoleController::class);

    Route::resource('users', UserController::class);

    Route::resource('educations', EducationController::class);

    Route::resource('experiences', ExperienceController::class);
    
    Route::resource('skills', SkillController::class);
});

/**
 * Note
 * If we want to use routes/api.php
 * We need to uncomment \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class in Http/Kernel.php
 */

// Grouping all controller to Routing
// Route::controller(RoleController::class)->group(function () {
//     // Auto generate method GET, POST, PUT, DELETE method HTTP with endpoint roles
//     Route::resource('roles', RoleController::class);
// });

// Route::controller(UserController::class)->group(function () {
//     Route::resource('users', UserController::class);
// });

// Route::controller(EducationController::class)->group(function () {
//     Route::resource('educations', EducationController::class);
// });

// Route::controller(ExperienceController::class)->group(function () {
//     Route::resource('experiences', ExperienceController::class);
// });

// Route::controller(SkillController::class)->group(function () {
//     Route::resource('skills', SkillController::class);
// });