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
Route::get('/events', [EventsController::class, 'showAll'])->name('events');

Route::get('/admin/events', [EventsController::class, 'index'])->name('admin.events');

// Meetings
Route::post('/meetings/save', [MeetingController::class, 'save'])->name('saveMeeting');
Route::post('/meetings/addAttendance', [MeetingController::class, 'addAttendance'])->name('saveAttendace');
Route::get('/meetings', [MeetingController::class, 'get'])->name('getMeetings');
Route::get('/meetings/{meetingId}', [MeetingController::class, 'getMeetingAttendances'])->name('getMeetingAttendances');
Route::put('/meetings/update', [MeetingController::class, 'update'])->name('updateMeeting');
Route::delete('/meetings/{meetingId}', [MeetingController::class, 'delete'])->name('deleteMeeting');
Route::delete('/meetings/attendances/{attendanceId}', [MeetingController::class, 'deleteAttendance'])
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

//Events
Route::post('/admin/events/create', [EventsController::class, 'store']);
Route::get('/admin/events/create', [EventsController::class, 'create'])->name('event.create');
Route::post('/admin/events', [EventsController::class, 'get'])->name('admin.events');
//Route::post('/admin/events/create', [EventsController::class, 'save']);
Route::delete('/admin/events/{id}', [EventsController::class, 'delete'])->name('event.delete');
Route::get('/admin/events', [EventsController::class, 'index'])->name('event.index');



