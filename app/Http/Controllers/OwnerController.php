<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OwnerController extends Controller
{
    function index()
    {
        return view('owner.dashboard');
    }
}
