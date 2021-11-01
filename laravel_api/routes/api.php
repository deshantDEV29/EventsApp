<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\EventController;
use App\Http\Controllers\API\QuizController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {

    Route::get('displayEvents', [EventController::class, 'displayEvents']);
    Route::post('displayDetails', [EventController::class, 'displayDetails']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('getQuestions', [QuizController::class, 'getQuestions']);
    Route::get('getQuiz', [QuizController::class, 'getQuiz']);
});
 