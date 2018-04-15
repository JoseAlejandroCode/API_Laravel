<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContentController extends Controller
{
    function home()
    {
        return view('content/home', [] );
    }
}
