<?php

namespace Database\Seeders;

use App\Models\TicketCategory;
use Illuminate\Database\Seeder;

class TicketCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $first = TicketCategory::whereId(1)->first();
        if($first){
            $first->title = "1С";
            $first->value = "accountant_problem";
            $first->save();
        }
        else{
             TicketCategory::create(
                [
                    "id" => 1,
                    "title" => "1С",
                    "value" => "accountant_problem"
                ],
            );
        }

        TicketCategory::create(
            [
                "id" => 2,
                "title" => "Вопросы по Power BI, Power Apps",
                "value" => "microsoft_products"
            ],
        );
        TicketCategory::create(
            [
                "id" => 3,
                "title" => "Проблемы с ПК",
                "value" => "problems_with_pc"
            ],
        );
        TicketCategory::create(
            [
                "id"=>4,
                "title"=>"Проблемы с МФУ",
                "value"=>"problems_with_printers"
            ],
        );
        TicketCategory::create(
            [
                "id"=>5,
                "title"=>"Проблемы с Интернетом",
                "value"=>"problems_with_internet"
            ],
        );
        TicketCategory::create(
            [
                "id"=>6,
                "title"=>"Замена картриджа",
                "value"=>"reload_printer_part"
            ],
        );
        TicketCategory::create(
            [
                "id"=>7,
                "title"=>"Вопросы по информ. системам (Документолог, АСУ КТТ и тд.).",
                "value"=>"other_informational_system"
            ],
        );
        TicketCategory::create(
            [
                "id"=>8,
                "title"=>"Другое",
                "value"=>"other"
            ],
        );
    }
}
