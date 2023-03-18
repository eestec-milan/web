<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventsController extends Controller
{
    public function index()
    {
        $years = DB::table('meetings')
            ->select(DB::raw('YEAR(date) as year'))
            ->distinct()
            ->orderBy('year', 'desc')
            ->get();
        return view('frontend.events',[
            'events'=>Meeting::all(),
            'years'=>$years
        ]);
    }

}
