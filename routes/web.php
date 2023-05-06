<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\HomepageController;
use Illuminate\Support\Facades\Route;
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

Route::get('/', [HomepageController::class, 'index'])->name('homepage');
Route::get('/about', [AboutController::class, 'index'])->name('about');
//Route::get('/test', [MeetingController::class, 'index'])->name('test');

Route::get('/events', [EventsController::class, 'index'])->name('events');

// Meetings
Route::post('/meetings/save', [MeetingController::class, 'save'])->name('saveMeeting');
Route::get('/meetings/attendance/create/{meetingId}', [MeetingController::class, 'createAttendance'])->name('attendance.create');
Route::post('/meetings/addAttendance', [MeetingController::class, 'addAttendance'])->name('saveAttendace');
Route::get('/meetings', [MeetingController::class, 'index'])->name('meetings');
Route::post('/meetings', [MeetingController::class, 'get'])->name('dashboard.admin.meetings');
Route::get('/meetings/{meetingId}', [MeetingController::class, 'getMeetingAttendances'])->name('getMeetingAttendances');
Route::put('/meetings/update', [MeetingController::class, 'update'])->name('updateMeeting');
Route::delete('/meetings/{meetingId}', [MeetingController::class, 'delete'])->name('deleteMeeting');
Route::delete('/meetings/attendancces/{attendanceId}', [MeetingController::class, 'deleteAttendance'])
    ->name('deleteAttendance');

// Members
Route::get('/members', [MemberController::class, 'index'])->name('member.index');
Route::get('/members/create', [MemberController::class, 'create'])->name('member.create');
Route::post('/members/create', [MemberController::class, 'save']);
Route::get('/members/attendances/{memberId}', [MemberController::class, 'getMemberAttendances'])
    ->name('getMemberAttendances');
Route::post('/members', [MemberController::class, 'get'])->name('dashboard.admin.users');
Route::get('/members/{memberId}', [MemberController::class, 'getById'])->name('getMemberById');
Route::get('/members/email/{email}', [MemberController::class, 'getByEmail'])->name('getMemberByEmail');
Route::put('/members/update', [MemberController::class, 'update'])->name('updateMember');
Route::get('/members/{meetingId}', [MeetingController::class, 'getById'])->name('getMeetingIdById');
Route::delete('/members/{memberId}', [MemberController::class, 'delete'])->name('member.delete');



