<?php

namespace App\Http\Requests\TechSupportDirector;

use Illuminate\Foundation\Http\FormRequest;

class TicketStatusCreateRequest extends FormRequest
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
            "value"=>"required|max:255|unique:ticket_status,value",
            "prev_id"=>"nullable|sometimes|exists:ticket_status,id",
            "next_id"=>"nullable|sometimes|exists:ticket_status,id",
        ];
    }
}
