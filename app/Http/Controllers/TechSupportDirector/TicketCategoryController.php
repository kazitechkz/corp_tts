<?php

namespace App\Http\Controllers\TechSupportDirector;

use App\Http\Controllers\Controller;
use App\Http\Requests\TechSupportDirector\TicketCategoryCreateRequest;
use App\Http\Requests\TechSupportDirector\TicketCategoryEditRequest;
use App\Models\TicketCategory;
use Illuminate\Http\Request;

class TicketCategoryController extends Controller
{
    public function index()
    {
        return view("tech_support_director.ticket_category.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("tech_support_director.ticket_category.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketCategoryCreateRequest $request)
    {
        TicketCategory::add($request->all());
        return redirect()->route("cto-ticket-category.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if($model = TicketCategory::find($id)){
            return view("tech_support_director.ticket_category.show",compact("model"));
        }
        else{
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if($model = TicketCategory::find($id)){
            return view("tech_support_director.ticket_category.edit",compact("model"));
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
    public function update(TicketCategoryEditRequest $request, $id)
    {
        if($model = TicketCategory::find($id)){
           $model->edit($request->all());
           return redirect()->route("cto-ticket-category.index");
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
        if($model = TicketCategory::find($id)){
            if(!in_array($model->id, [1,2,3,4,5,6,7,8])){
                abort(400,message: "Вы не можете удалить системные данные");
            }
            else{
                $model->delete();
                return redirect()->route("cto-ticket-category.index");
            }
        }
        else{
            abort(404);
        }
    }
}
