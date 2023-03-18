<?php

use App\Http\Controllers\EventsController;
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
Route::get('/events', [EventsController::class, 'index'])->name('events');

// Meetings
Route::post('/meetings/save', [MeetingController::class, 'save'])->name('saveMeeting');
Route::post('/meetings/addAttendance', [MeetingController::class, 'addAttendance'])->name('saveAttendace');
Route::get('/meetings', [MeetingController::class, 'get'])->name('getMeetings');
Route::get('/meetings/{meetingId}', [MeetingController::class, 'getMeetingAttendances'])->name('getMeetingAttendances');
Route::get('/members/{meetingId}', [MeetingController::class, 'getById'])->name('getMeetingIdById');
Route::put('/meetings/update', [MeetingController::class, 'update'])->name('updateMeeting');
Route::delete('/meetings/{meetingId}', [MeetingController::class, 'delete'])->name('deleteMeeting');
Route::delete('/meetings/attendancces/{attendanceId}', [MeetingController::class, 'deleteAttendance'])
    ->name('deleteAttendance');

// Members
Route::post('/members/save', [MemberController::class, 'save'])->name('saveMember');
Route::get('/members/attendances/{memberId}', [MemberController::class, 'getMemberAttendances'])
    ->name('getMemberAttendances');
Route::get('/members', [MemberController::class, 'get'])->name('getMembers');
Route::get('/members/{memberId}', [MemberController::class, 'getById'])->name('getMemberById');
Route::get('/members/email/{email}', [MemberController::class, 'getByEmail'])->name('getMemberByEmail');
Route::put('/members/update', [MemberController::class, 'update'])->name('updateMember');
Route::delete('/members/{memberId}', [MemberController::class, 'delete'])->name('deleteMember');


Route::get('/backend', function () {
    return view('backend.blank');
});

