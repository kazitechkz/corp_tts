<?php

namespace App\Http\Requests\TechSupportDirector;

use Illuminate\Foundation\Http\FormRequest;

class TicketCategoryEditRequest extends FormRequest
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
        $id = $this->route('id');
        return [
            "title" => "required|max:255",
            "value"=>"required|max:255|unique:ticket_categories,value,$id|
            not_in:accountant_problem,microsoft_products,problems_with_pc,problems_with_printers,problems_with_internet,
            reload_printer_part,other_informational_system,other",
        ];
    }
}
