<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('events', EventController::class);
    $router->resource('livequestions', LiveQuestionController::class);
    $router->resource('questions', QuestionController::class);
    $router->resource('quizzes', QuizController::class);
    $router->resource('sessions', SessionController::class);
});
