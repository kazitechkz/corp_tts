<?php

namespace App\Http\Controllers\TechSupportDirector;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TechSupportUserController extends Controller
{
    public function index()
    {
        return view("tech_support_director.ticket_executors.index");
    }
}
