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
           $hour = (TicketDeadline::find($request->get("deadline_id")))->time_limit_hour;
           $input["deadline_date"] = Carbon::now()->addHours($hour);
           $ticket = Ticket::add($input);
           if($request->hasFile("file_url")){
               $ticket = $ticket->uploadFile($request->file("file_url"),"file_url");
           }
           toastr()->success("Ваша заявка создана!");
           return redirect()->route("tech-support-ticket-show",$ticket->id);
       }
       catch (\Exception $exception){
           toastError($exception->getMessage());
       }
       return redirect()->route("tech-support-ticket-list");
    }

    public function show($id){
        $ticket = Ticket::where(["user_id" => auth()->id(),"id"=>$id])
            ->with(["user","executor","status","deadline"])
            ->first();
        if($ticket){
            return view("employee.tech-support.show",compact("ticket"));
        }
        return redirect()->route("tech-support-ticket-list");
    }

    public function edit($id){
        $categories = TicketCategory::all();
        $deadlines = TicketDeadline::all();
        $ticket = Ticket::where(["user_id" => auth()->id(),"id"=>$id,"status_id"=>1])
            ->with(["user","executor","status","deadline"])
            ->first();
        if($ticket){
            return view("employee.tech-support.edit",compact("ticket","categories","deadlines"));
        }
        return redirect()->route("tech-support-ticket-list");
    }


    public function update($id,Request $request){
        $ticket = Ticket::where(["user_id" => auth()->id(),"id"=>$id,"status_id"=>1])->first();
        if($ticket){
            $input = $request->all();
            $hour = (TicketDeadline::find($request->get("deadline_id")))->time_limit_hour;
            $input["deadline_date"] = $ticket->created_at->addHours($hour);
           $ticket->edit($input);
        }
        return redirect()->route("tech-support-ticket-show",$id);
    }


    public function updateTicket($id,Request $request){
        $request->validate([
            "reopened_by_user"=>"required",
            "rating"=>"required_if:!reopened_by_user,true|integer|min:1|max:5"
        ]);
        $ticket = Ticket::where(["user_id" => auth()->id(),"id"=>$id])->first();
        if($ticket){
            if($request->get("reopened_by_user") == true){
                $ticket->edit(["status_id"=>4]);
                $ticket->edit(["reopened_by_user"=>true]);
            }
            if($request->get("reopened_by_user") == false){
                $ticket->edit(["rating"=>$request->get("rating")]);
                $ticket->edit(["reopened_by_user"=>false]);
            }
        }
        return redirect()->back();
    }

    public function delete($id){
        $ticket = Ticket::where(["user_id" => auth()->id(),"id"=>$id,"status_id"=>1])->first();
        if($ticket){
            $ticket->delete();
            toastSuccess("Тикет удален");
        }
        return redirect()->route("tech-support-ticket-list");
    }
}
