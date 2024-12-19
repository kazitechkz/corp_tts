<?php

namespace App\Http\Controllers\TechSupportDirector;

use App\Http\Controllers\Controller;
use App\Http\Requests\TechSupportDirector\TicketDeadlineCreateRequest;
use App\Http\Requests\TechSupportDirector\TicketDeadlineEditRequest;
use App\Models\TicketDeadline;
use Illuminate\Http\Request;

class TicketDeadlineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("tech_support_director.ticket_deadline.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("tech_support_director.ticket_deadline.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketDeadlineCreateRequest $request)
    {
        $input = $request->all();
        TicketDeadline::add($input);
        return redirect()->route("cto-ticket-deadline.index");
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
        if($model = TicketDeadline::find($id)){
            return view("tech_support_director.ticket_deadline.edit",compact("model"));
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
    public function update(TicketDeadlineEditRequest $request, $id)
    {
        $input = $request->all();
        if($model = TicketDeadline::find($id)){
            $model->edit($input);
            return redirect()->route("cto-ticket-deadline.index");
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
