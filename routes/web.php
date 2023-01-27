<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\MemberController;

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
Route::get('/test', [MeetingController::class, 'index'])->name('test');
Route::post('/members/save', [MemberController::class, 'save'])->name('saveMember');
Route::post('/meetings/save', [MeetingController::class, 'save'])->name('saveMeeting');
Route::post('/meetings/addAttendance', [MeetingController::class, 'addAttendance'])->name('saveAttendace');
Route::get('/test/{meetingId}', [MeetingController::class, 'getMeetingAttendances'])->name('getMeetingAttendances');


Route::get('/backend', function () {
    return view('backend.blank');
});

