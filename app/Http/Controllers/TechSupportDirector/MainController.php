<?php

namespace App\Http\Controllers\TechSupportDirector;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view("tech_support_director.index");
    }
}
