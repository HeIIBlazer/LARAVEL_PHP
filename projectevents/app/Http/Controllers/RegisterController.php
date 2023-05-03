<?php

namespace App\Http\Controllers;

use App\Models\Register_event;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        $register_events = Register_event::orderBy('updated_at', 'ASC')->get();
        return view('register.index', compact('register_events'));
    }
}
