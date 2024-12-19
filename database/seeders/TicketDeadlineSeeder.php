<?php

namespace Database\Seeders;

use App\Models\TicketDeadline;
use Illuminate\Database\Seeder;

class TicketDeadlineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(TicketDeadline::count() == 0){
            TicketDeadline::create([
                'title'=>"Очень срочно",
                'value'=>"high_emergency",
                'time_limit_hour'=>2
            ]);
            TicketDeadline::create([
                'title'=>"Срочно",
                'value'=>"middle_emergency",
                'time_limit_hour'=>4
            ]);
            TicketDeadline::create([
                'title'=>"Не срочно",
                'value'=>"low_emergency",
                'time_limit_hour'=>24
            ]);
        }
    }
}
