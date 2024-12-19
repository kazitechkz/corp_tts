<?php

namespace App\Http\Controllers\TechSupportEmployee;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Ticket;
use App\Models\TicketExecutor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view("tech_support_employee.ticket.index");
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
            $at_time = true;
            if($ticket->deadline_date < Carbon::now()){
                $at_time = false;
            }
            $ticket->at_time = $at_time;
            $ticket->deadline_date = null;
            $ticket->executor_id = auth()->id();
            $ticket->status_id = 2;
            toastr()->success("Успешно взят тикет");
            $ticket->save();
            Notification::add([
                "topic"=>"Ваш тикет № $ticket->id взят в работу сотрудником технической поддержки:". auth()->user()->name,
                "message"=>"Уважаемый пользователь, ваш тикет № $ticket->id взят в работу, пожалуйста, отслеживайте его в личном кабинете техподдержки",
                "user_id"=>$ticket->user_id
            ]);
            return redirect()->route("tech-support-employee-ticket-show",$ticket->id);
        }
        return redirect()->back();
    }
    public function show_ticket($id)
    {
        $ticket = Ticket::
        where(["executor_id"=>auth()->id(),"id"=>$id])
            ->with(["user.department.company","category","deadline","status"])
            ->first();
        if($ticket){
            return view("tech_support_employee.ticket.show",compact("ticket"));
        }
        else{
            toastError("Не найден тикет");
        }
        return redirect()->back();
    }

    public function update_ticket($id,Request $request)
    {
        $ticket = Ticket::where(["executor_id"=>auth()->id(),"id"=>$id])->first();
        if($ticket){
            if($request->get("status_id") == 3){
                $ticket->status_id = 3;
                $status = "Завершен";
            }
            if($request->get("status_id" == 4)){
                $ticket->is_reopen = true;
                $status = "Переоткрыт";
            }
            Notification::add([
                "topic"=>"Ваш тикет № $ticket->id изменил статус на $status сотрудником технической поддержки:". auth()->user()->name,
                "message"=>"Уважаемый пользователь, ваш тикет № $ticket->id изменил статус, пожалуйста, отслеживайте его в личном кабинете техподдержки",
                "user_id"=>$ticket->user_id
            ]);
            $ticket->save();
        }
        return redirect()->back();

    }
}
