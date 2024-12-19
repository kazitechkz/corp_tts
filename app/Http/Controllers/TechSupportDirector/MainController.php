<?php

namespace App\Http\Controllers\TechSupportDirector;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view("tech_support_director.tickets.report");
    }

    public function tickets()
    {
        return view("tech_support_director.tickets.report");
    }

    public function canban()
    {
        $new_tickets = Ticket::where(["status_id"=>1])
            ->with(["user.department.company","executor","category","deadline","status"])
            ->get();
        $in_works = Ticket::where(["status_id"=>2])
            ->with(["user.department.company","executor","category","deadline","status"])
            ->get();
        $reopeneds = Ticket::where(["status_id"=>4])
            ->with(["user.department.company","executor","category","deadline","status"])
            ->get();
        return view("tech_support_director.tickets.canban",compact("new_tickets","in_works","reopeneds"));
    }

    public function profile()
    {
        return view("tech_support_director.profile");
    }
}
