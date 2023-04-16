<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {

        return view('frontend.homepage',[
            'events'=>Event::orderBy('date', 'desc')->get(),
        ]);
    }

}
