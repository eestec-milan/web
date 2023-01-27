<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MemberController extends Controller
{

    public function save(Request $request){

        $name = $request["name"];
        $email = $request["email"];
        $surname = $request["surname"];

        $validated = $request->validate([
            'email' => 'required|unique:members|email',
            'name' => 'required',
            'surname' => 'required',
        ]);
        if($validated){

        $member = new Member();

        $member->name =$name;
        $member->surname =$surname;
        $member->email =$email;

        $member->save();
        Log::alert($name);
        Log::alert($email);
        Log::alert($surname);

        return view("backend.test");
        }else{
            abort(422);
        }
    }

    public function getByEmail($email){}
    public function getById($id){

    }
    public function getMemberAttendances($memberId){

    }

}
