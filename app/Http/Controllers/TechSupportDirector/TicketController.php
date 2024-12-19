<?php

namespace App\Http\Controllers\TechSupportDirector;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index($id)
    {
        $ticket = Ticket::where(["id"=>$id])
            ->with(["user.department.company","category","deadline","status"])
            ->first();
        if($ticket){
            return view("tech_support_director.tickets.show",compact("ticket"));
        }
        else{
            toastError("Не найден тикет");
        }
        return redirect()->back();
    }
}
