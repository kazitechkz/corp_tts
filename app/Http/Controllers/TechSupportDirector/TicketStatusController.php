<?php

namespace App\Http\Controllers\TechSupportDirector;

use App\Http\Controllers\Controller;
use App\Http\Requests\TechSupportDirector\TicketStatusCreateRequest;
use App\Http\Requests\TechSupportDirector\TicketStatusEditRequest;
use App\Models\TicketStatus;
use Illuminate\Http\Request;

class TicketStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("tech_support_director.ticket_status.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("tech_support_director.ticket_status.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketStatusCreateRequest $request)
    {
        $input = $request->all();
        $input["is_last"] = $request->boolean("is_last");
        $input["is_first"] = $request->boolean("is_first");
        TicketStatus::add($input);
        return redirect()->route("cto-ticket-status.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if($model = TicketStatus::find($id)){
            return view("tech_support_director.ticket_status.edit",compact("model"));
        }
        else{
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TicketStatusEditRequest $request, $id)
    {
        $input = $request->all();
        $input["is_last"] = $request->boolean("is_last");
        $input["is_first"] = $request->boolean("is_first");
        if($model = TicketStatus::find($id)){
            $model->edit($input);
            return redirect()->route("cto-ticket-status.index");
        }
        else{
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
