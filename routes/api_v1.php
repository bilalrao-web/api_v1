<?php

use App\Http\Controllers\Api\V1\AttendeesController;
use App\Http\Controllers\Api\V1\TicketController;
use App\Http\Controllers\Api\V1\AuthorsController;
use App\Http\Controllers\Api\V1\AuthorTicketsController;
use App\Http\Controllers\Api\V1\EventController;
use App\Http\Controllers\Api\V1\TypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('tickets',TicketController::class);
    Route::apiResource('authors',AuthorsController::class);
        Route::apiResource('authors.tickets',AuthorTicketsController::class);
    Route::apiResource('events',EventController::class);
    Route::apiResource('attendees',AttendeesController::class);
    Route::apiResource('types',TypeController::class);



});


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
