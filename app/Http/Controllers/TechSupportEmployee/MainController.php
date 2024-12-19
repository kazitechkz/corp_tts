<?php

namespace App\Http\Controllers\TechSupportEmployee;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\TicketExecutor;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view("tech_support_employee.index");
    }

    public function tickets()
    {
        return view("tech_support_employee.ticket.index");
    }

    public function take_ticket($id)
    {
        $my_categories = TicketExecutor::where(["executor_id" => auth()->id()])
            ->pluck("category_id")->toArray();
        $ticket = Ticket::where(["executor_id"=>null,"id"=>$id])->whereIn("category_id",$my_categories)->first();
        if($ticket){
            $ticket->executor_id = auth()->id();
            $ticket->status_id = 2;
            $ticket->save();
        }
        return redirect()->back();
    }
    public function show_ticket($id)
    {
        $ticket = Ticket::where(["executor_id"=>auth()->id(),"id"=>$id])->first();
        if($ticket){
            return view("tech_support_employee.ticket.show",compact("ticket"));
        }
        else{
            toastError("Не найден тикет");
        }
        return redirect()->back();
    }

    public function update_ticket($id)
    {
        $ticket = Ticket::where(["executor_id"=>auth()->id(),"id"=>$id])->first();
        if($ticket){

        }

    }
}
