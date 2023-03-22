<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventsController;
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
// API Tests

Route::post("/events", [EventsController::class, "store"])->name("createEvent");
Route::get("/events/{id:int}", [EventsController::class, "getById"])->name("getEventById");
Route::get("/events", [EventsController::class, "getAll"])->name("getEvents");
Route::post("/events/{id:int}", [EventsController::class, "update"])->name("updateEvent");
Route::delete("/events/{id:int}", [EventsController::class, "delete"])->name("deleteEvent");

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



