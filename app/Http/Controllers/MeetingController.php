<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Meeting;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MeetingController extends Controller
{
    //
    public function index()
    {

        $meetings = Meeting::all();
        $members = Member::all();
        Log::debug($members);
        return view("backend.test", ["meetings" => $meetings, "members" => $members]);
    }

    // Read
    public function get()
    {
        $meetings = Meeting::all();
        return view("backend.test", ["meetings" => $meetings]);
    }

    public function getById($id)
    {
        $meeting = Meeting::findOrFail($id);


        $meetings = Meeting::all();
        $members = Member::all();
        return view("backend.test", ["meetings" => $meetings, "members" => $members]);
    }

    public function getMeetingAttendances($meetingId)
    {
        $meeting = Meeting::find($meetingId);
        if (!$meeting) {
            abort(404);
        }
        $attendances = $meeting->members;


        $meetings = Meeting::all();
        $members = Member::all();
        return view("backend.test", ["meetings" => $meetings, "members" => $members, "attendances" => $attendances]);
    }

    // Insert
    public function save(Request $request)
    {

        $location = $request["location"];
        $date = $request["date"];
        $title = $request["title"];

        $validated = $request->validate([
            'location' => 'required',
            'date' => 'required|date',
            'title' => 'required',
        ]);
        if ($validated) {

            $meeting = new Meeting();

            $meeting->location = $location;
            $meeting->date = $date;
            $meeting->title = $title;

            $meeting->save();

            $meetings = Meeting::all();
            $members = Member::all();

            return view("backend.test", ["meetings" => $meetings, "members" => $members]);
        } else {
            abort(422);
        }
    }

    public function addAttendance(Request $request)
    {
        $attendance = new Attendance();
        $meetingId = $request["meetingId"];
        $memberId = $request["memberId"];


        $validated = $request->validate([
            'meetingId' => 'required',
            'memberId' => 'required',
        ]);
        if (!$validated) {
            abort(422);
        }

        Meeting::findOrFail($meetingId);
        Member::findOrFail($memberId);
        $attendance->meetingId = $meetingId;
        $attendance->memberId = $memberId;
        $attendance->save();

        $meetings = Meeting::all();
        $members = Member::all();
        return view("backend.test", ["meetings" => $meetings, "members" => $members]);

    }

    // Update
    public function update(Request $request)
    {

        $location = $request["location"];
        $date = $request["date"];
        $title = $request["title"];

        $validated = $request->validate([
            'location' => 'required',
            'date' => 'required|date',
            'title' => 'required',
            'meetingId' => 'required',
        ]);
        if ($validated) {

            $meeting = Meeting::find($request["meetingId"]);

            $meeting->location = $location;
            $meeting->date = $date;
            $meeting->title = $title;

            $meeting->save();

            $meetings = Meeting::all();
            $members = Member::all();
            return view("backend.test", ["meetings" => $meetings, "members" => $members]);
        } else {
            abort(422);
        }

    }

    // Delete
    public function delete($meetingId)
    {
        Meeting::destroy($meetingId);
        return $this->index();
    }

    public function deleteAttendance($attendanceId)
    {
        Attendance::destroy($attendanceId);
        return $this->index();
    }
}
