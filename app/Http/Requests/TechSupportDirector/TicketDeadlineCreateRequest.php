<?php

namespace App\Http\Requests\TechSupportDirector;

use Illuminate\Foundation\Http\FormRequest;

class TicketDeadlineCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "title"=>"required|max:255",
            "value"=>"required|max:255|unique:ticket_deadlines,value",
            "time_limit_hour"=>"required|min:1",
        ];
    }
}
