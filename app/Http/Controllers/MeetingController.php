<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Meeting;
use App\Models\Member;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class MeetingController extends Controller
{

    public function get(Request $request)
    {
        $data = $request->all();
        $result = DB::table('meetings')
            ->where('title', 'like', '%' . $data['search']['value'] . '%')
            ->orderBy('title')
            ->skip($data['start'])
            ->take($data['length'])
            ->get();

        $filtered = DB::table('meetings')
            ->where('title', 'like', '%' . $data['search']['value'] . '%')
            ->count();
        $returnData = collect(["draw" => $data['draw'], "recordsTotal" => DB::table('meetings')->count(), "recordsFiltered" => $filtered]);
        $arr = collect([]);
        foreach ($result as $res) {
            $qr_path = asset('storage/qrcode/'.$res->id.'.svg');

            if(!Storage::disk('public')->exists('qrcode/'.$res->id.'.svg'))
            {
                Storage::disk('public')->makeDirectory('qrcode');
                QrCode::format('svg')->generate(route('attendance.create',['meetingId'=>$res->id]),storage_path('app/public').'/qrcode/'.$res->id.'.svg');

            }
            $option = '
            <button class="bg-black rounded text-white text-sm font-semibold uppercase p-2"><i class="fa-solid fa-pen"></i> Modify</button>
            <button class="bg-red rounded text-white text-sm font-semibold uppercase p-2" onclick = "deleteConfirm(' . $res->id . ')"><i class="fa-regular fa-circle-xmark"></i> Delete</button>
            <button class="bg-red rounded text-white text-sm font-semibold uppercase p-2" onclick = "showQR(\''.$qr_path.'\')"><i class="fa-regular fa-circle-xmark"></i> Show QR</button>';

            $arr->push([
                Carbon::parse($res->date)->format('d-m-Y'),
                $option,
            ]);
        }

        $returnData->put('data', $arr);
        return response()->json($returnData);

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

    public function index()
    {
        return view('backend.meetings.index');
    }
}
