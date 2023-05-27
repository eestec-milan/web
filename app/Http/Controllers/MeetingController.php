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
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class MeetingController extends Controller
{

    public function get(Request $request)
    {
        $data = $request->all();
        $result = DB::table('meetings')
            ->where('date', 'like', '%' . $data['search']['value'] . '%')
            ->orderBy('date')
            ->skip($data['start'])
            ->take($data['length'])
            ->get();

        $filtered = DB::table('meetings')
            ->where('date', 'like', '%' . $data['search']['value'] . '%')
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
            <button class="bg-red rounded text-white text-sm font-semibold uppercase p-2" onclick = "deleteConfirm(' . $res->id . ')"><i class="fa-regular fa-circle-xmark"></i> Delete</button>
            <button class="bg-blue-600 rounded text-white text-sm font-semibold uppercase p-2" onclick = "showQR(\''.$qr_path.'\')"><i class="fa-solid fa-qrcode"></i> Show QR</button>';

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

    public function createAttendance($meetingId)
    {
        return view('backend.meetings.attendance',['meetingId'=>$meetingId,'meeting'=>Meeting::find($meetingId)]);
    }

    public function storeAttendance(Request $request)
    {
        $meeting = $request["meetingId"];
        $email = $request["email"];

        Validator::make($request->all(), [
            'email' => 'required|exists:members,email',
            'meetingId' => 'required|exists:meetings,id',
        ])->validate();

        $now = Carbon::now()->format('Y-m-d');
        $meetingDate = Meeting::find($meeting)->whereDate('date', $now);

        if($meetingDate->count()!=0)
        {
            $attendance = new Attendance();
            $attendance->meetingId = $meeting;
            $attendance->memberId = Member::where('email', $email)->first()->id;
            $attendance->save();

            return view('backend.meetings.attendance', ['meetingId' => $meeting, 'meeting'=>Meeting::find($meeting)])->with('success', new MessageBag(['The attendance has been registered']));
        }
        else
            return view('backend.meetings.attendance',['meetingId'=>$meeting,'meeting'=>Meeting::find($meeting)])->with('errors', new MessageBag(['The attendance form for this meeting has expired']));
    }

    public function create()
    {
        return view('backend.meetings.create');
    }

    public function store(Request $request)
    {
        $date = $request["meeting_date"];

        Validator::make($request->all(), [
            'meeting_date' => 'required|date',
        ])->validate();

        $meeting = new Meeting();

        $meeting->date = $date;

        $meeting->save();


        return view('backend.meetings.create')->with('success', new MessageBag(['The meeting has been created.']));

    }
}
