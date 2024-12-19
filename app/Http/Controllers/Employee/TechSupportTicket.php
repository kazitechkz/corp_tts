<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Admin\TechSupportCategoryTicket;
use App\Http\Controllers\Controller;
use App\Http\Requests\Ticket\TicketCreateRequest;
use App\Models\Ticket;
use App\Models\TicketCategory;
use App\Models\TicketDeadline;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TechSupportTicket extends Controller
{
    public function index(){
        return view("employee.tech-support.index");
    }

    public function create(){
        $categories = TicketCategory::all();
        $deadlines = TicketDeadline::all();
        return view("employee.tech-support.create",compact("categories","deadlines"));
    }

    public function store(TicketCreateRequest $request){
       try{
           $input = $request->only(["title","description","file_url","category_id","deadline_id"]);
           $input["user_id"] = auth()->id();
           $input["status_id"] = 1;
           $input["category_value"] = ($ticketCategory = TicketCategory::find($request->get("category_id")))->value;
           $input["deadline_date"] = Carbon::now()->addHour((TicketDeadline::find($request->get("deadline_id")))->time_limit_hour);
           $ticket = Ticket::add($input);
           if($request->hasFile("file_url")){
               $ticket = $ticket->uploadFile($request->file("file_url"),"file_url");
           }
           return redirect()->route("tech-support-ticket-show",$ticket->id);
       }
       catch (\Exception $exception){
           toastError($exception->getMessage());
       }
       return redirect()->route("tech-support-ticket-list");
    }

    public function show($id){
        $ticket = Ticket::where(["user_id" => auth()->id(),"id"=>$id])->first();
        if($ticket){
            return view("employee.tech-support.show",compact("ticket"));
        }
        return redirect()->route("tech-support-ticket-list");
    }
    public function update($id){
        $ticket = Ticket::where(["user_id" => auth()->id(),"id"=>$id])->first();
        if($ticket){
           $ticket->edit(["is_resolved"=>true]);
        }
        return redirect()->back();
    }
}
