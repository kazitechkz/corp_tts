<?php

namespace Database\Seeders;

use App\Models\TicketStatus;
use Illuminate\Database\Seeder;

class TicketStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(TicketStatus::count() == 0){
            TicketStatus::create([
                "id"=>1,
                'title'=>"Новая заявка",
                'value'=>"new_request",
                'is_first'=>true,
                'is_last'=>false,
            ]);
            TicketStatus::create([
                "id"=>2,
                'title'=>"В работе",
                'value'=>"taken_request",
                'is_first'=>false,
                'is_last'=>false,
            ]);
            TicketStatus::create([
                "id"=>3,
                'title'=>"Завершен",
                'value'=>"finished_request",
                'is_first'=>false,
                'is_last'=>true,
            ]);
            TicketStatus::create([
                "id"=>4,
                'title'=>"На доработке",
                'value'=>"not_finished_yet_request",
                'is_first'=>false,
                'is_last'=>true,
            ]);
            TicketStatus::where("id",1)->update(["next_id"=>2]);
            TicketStatus::where("id",2)->update(["prev_id"=>1,"next_id"=>3]);
            TicketStatus::where("id",3)->update(["prev_id"=>2,"next_id"=>4]);
            TicketStatus::where("id",4)->update(["prev_id"=>3,"next_id"=>3]);
        }
    }
}
