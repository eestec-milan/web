<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MemberController extends Controller
{
    // Read
    public function get(Request $request)
    {
        $data = $request->all();
        $result = DB::table('members')
            ->where('name','like','%'.$data['search']['value'].'%')
            ->orderBy('name')
            ->skip($data['start'])
            ->take($data['length'])
            ->get();

        $filtered = DB::table('members')
            ->where('name','like','%'.$data['search']['value'].'%')
            ->count();
        $returnData = collect(["draw" => $data['draw'], "recordsTotal" =>  DB::table('members')->count(), "recordsFiltered" => $filtered]);
        $arr = collect([]);
        foreach ($result as $res){
            $option = '
            <button type="modify" class="bg-black rounded text-white text-sm font-semibold uppercase p-2"><i class="fa-solid fa-pen"></i> Modify</button>
            <button type="delete" class="bg-red rounded text-white text-sm font-semibold uppercase p-2" onclick = "deleteConfirm('.$res->id.')"><i class="fa-regular fa-circle-xmark"></i> Delete</button>';

            $arr->push([
                $res->name,
                $res->email,
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

        $name = $request["name"];
        $email = $request["email"];
        $surname = $request["surname"];

        $validated = $request->validate([
            'email' => 'required|unique:members|email',
            'name' => 'required',
            'surname' => 'required',
        ]);
        if ($validated) {

            $member = new Member();

            $member->name = $name;
            $member->surname = $surname;
            $member->email = $email;

            $member->save();
            Log::alert($name);
            Log::alert($email);
            Log::alert($surname);

            return view("backend.test");
        } else {
            abort(422);
        }
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
}
