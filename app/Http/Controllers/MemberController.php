<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MemberController extends Controller
{
    // Read
    public function get()
    {
        $members = Member::all();
        return view("backend.test", ["members" => $members]);
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
        return $this->get();
    }
}
