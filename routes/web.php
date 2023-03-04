<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\EventsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/about', [AboutController::class, 'index'])->name('about');

// API Tests

Route::post("/events", [EventsController::class, "store"])->name("createEvent");
Route::get("/events/{id:int}", [EventsController::class, "getById"])->name("getEventById");
Route::get("/events", [EventsController::class, "getAll"])->name("getEvents");
Route::put("/events/{id:int}", [EventsController::class, "update"])->name("updateEvent");
Route::get("/test", function (){
    return view("backend.test");
});

Route::get('/backend', function () {
    return view('backend.blank');
});

