<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Meeting;
use App\Models\Member;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class MemberController extends Controller
{
    // Read
    public function get(Request $request)
    {
        $data = $request->all();
        $result = DB::table('members')
            ->where('name', 'like', '%' . $data['search']['value'] . '%')
            ->orderBy('name')
            ->skip($data['start'])
            ->take($data['length'])
            ->get();

        $filtered = DB::table('members')
            ->where('name', 'like', '%' . $data['search']['value'] . '%')
            ->count();
        $returnData = collect(["draw" => $data['draw'], "recordsTotal" => DB::table('members')->count(), "recordsFiltered" => $filtered]);
        $arr = collect([]);

        $currentDate = Carbon::now();

        if ($currentDate->month >= 9 && $currentDate->month <= 12) {
            $year = $currentDate->year;
        }
        else
            $year = $currentDate->year - 1;
        $startDate = $year . '-09-01';
        $endDate = ($year + 1) . '-09-01';

        foreach ($result as $res) {
            $attendance = Attendance::where('memberId', $res->id)
                ->join('meetings', 'attendances.meetingId', '=', 'meetings.id')
                ->orderBy('meetings.date')
                ->first();
            if(empty($attendance))
            {
                $consecutive_absences = Meeting::whereBetween('date', [$startDate, $endDate])->count();
                $total_attendaces = 0;
            }
            else{
                $consecutive_absences = Meeting::where('date','>',$attendance->meeting->date)->whereBetween('date', [$startDate, $endDate])->count();
                $total_attendaces = Attendance::where('memberId', $res->id)->get()->count();
            }
            $option = ' <div class="relative inline-block text-left">
                <div class="relative">
                    <button type="button" class="dropdown-button relative inline-flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 z-0" aria-expanded="false" aria-haspopup="true">
                        <i class="fas fa-arrow-down mr-2"></i>
                    </button>
                </div>
                <div class="dropdown-menu z-10 absolute right-0 w-40 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 hidden" role="menu" tabindex="-1">
                    <a href="#" class="dropdown-item z-10 flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">
                        <i class="fas fa-edit mr-2"></i>
                        Modify
                    </a>
                    <a href="#" onclick = "deleteConfirm(' . $res->id . ')" class="dropdown-item flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">
                        <i class="fas fa-trash-alt mr-2"></i>
                        Delete
                    </a>
                    <a href="#" class="dropdown-item flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">
                        <i class="fas fa-list mr-2"></i>
                        Show List
                    </a>
                </div>
            </div>';

            $arr->push([
                $res->name . ' ' . $res->surname,
                $consecutive_absences,
                $total_attendaces,
                $option,
            ]);
        }

        $returnData->put('data', $arr);
        return response()->json($returnData);
    }

    public function getByEmail($email)
    {
        $member = Member::where('email', $email)->get();
        if (!$member) {
            abort(404);
        }

        $meetings = Meeting::all();
        $members = Member::all();
        return view("backend.test", ["meetings" => $meetings, "members" => $members, "member" => $member]);
    }

    public function getById($memberId)
    {
        $member = Member::find($memberId);
        if (!$member) {
            abort(404);
        }
        $attendances = $member->meetings;
        $meetings = Meeting::all();
        $members = Member::all();
        return view("backend.test", ["meetings" => $meetings, "members" => $members, "member" => $member]);
    }

    public function getMemberAttendances($memberId)
    {

        $member = Member::find($memberId);
        if (!$member) {
            abort(404);
        }
        $attendances = $member->meetings;
        $meetings = Meeting::all();
        $members = Member::all();
        return view("backend.test", ["meetings" => $meetings, "members" => $members, "attendances" => $attendances]);

    }

    // Insert
    public function save(Request $request)
    {

        $name = $request["firstname"];
        $email = $request["email"];
        $surname = $request["lastname"];

        Validator::make($request->all(),[
            'email' => 'required|unique:members|email',
            'firstname' => 'required',
            'lastname' => 'required',
        ])->validate();

        $member = new Member();

        $member->name = $name;
        $member->surname = $surname;
        $member->email = $email;

        $member->save();
        Log::alert($name);
        Log::alert($email);
        Log::alert($surname);

        return view("backend.members.create");
    }


    public function update(Request $request)
    {

        $validated = $request->validate([
            'email' => 'required|email',
            'name' => 'required',
            'memberId' => 'required',
            'surname' => 'required',
        ]);
        if (!$validated) {
            abort(422);
        }
        $member = Member::find($request["memberId"]);
        $member->email = $request["email"];
        $member->name = $request["name"];
        $member->surname = $request["surname"];

        $member->save();

        return view("backend.test");
    }

    // Delete
    public function delete($memberId)
    {
        Member::destroy($memberId);
        return response()->json("success");
    }

    public function create()
    {

        return view('backend.members.create');
    }

    public function index()
    {
        $currentDate = Carbon::now();

        if ($currentDate->month >= 9 && $currentDate->month <= 12) {
            $year = $currentDate->year;
        }
        else
            $year = $currentDate->year - 1;
        $startDate = $year . '-09-01';
        $endDate = ($year + 1) . '-09-01';


        $meetingCount = Meeting::whereBetween('date', [$startDate, $endDate])->count();

        return view('backend.members.index',['meetingCount'=>$meetingCount]);
    }

    public function registration(){


    }
}