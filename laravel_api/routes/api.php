<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\EventController;
use App\Http\Controllers\API\QuizController;
use App\Http\Controllers\API\ChatController;
use App\Http\Controllers\API\SessionController;
use App\Http\Controllers\API\FAQController;

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
    Route::get('displayActiveUsers', [ChatController::class, 'displayActiveUsers']);
    Route::get('displayAllUsers', [ChatController::class, 'displayAllUsers']);
    Route::post('sendmessage', [ChatController::class, 'sendmessage']);
    Route::post('getMessage', [ChatController::class, 'getMessage']);
    Route::get('getConversation', [ChatController::class, 'getConversation']);
    Route::post('getSessions', [SessionController::class, 'getSessions']);
    Route::get('displayFAQ', [FAQController::class, 'displayFAQ']);
   
    
});
 