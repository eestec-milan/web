<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/* Controller methods names: https://laravel.com/docs/9.x/controllers#shallow-nesting */

class AboutController extends Controller
{
    public function index()
    {

        return view('frontend.about');
    }


}
