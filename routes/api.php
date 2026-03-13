<?php

use App\Http\Controllers\AiToolController;
use App\Http\Controllers\TrainingController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {

    //Trainings Route
    Route::get('/trainings',          [TrainingController::class, 'index']);
    Route::get('/trainings/{training}', [TrainingController::class, 'show']);
    Route::post('/trainings',         [TrainingController::class, 'store']);
    Route::put('/trainings/{training}', [TrainingController::class, 'update']);
    Route::delete('/trainings/{training}', [TrainingController::class, 'destroy']);

    // AI Tools Routes
    Route::get('/ai-tools',            [AiToolController::class, 'index']);
    Route::get('/ai-tools/{aiTool}',   [AiToolController::class, 'show']);
    Route::post('/ai-tools',           [AiToolController::class, 'store']);
    Route::put('/ai-tools/{aiTool}',   [AiToolController::class, 'update']);
    Route::delete('/ai-tools/{aiTool}',[AiToolController::class, 'destroy']);

});


