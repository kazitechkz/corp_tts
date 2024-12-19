<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if($role = Role::firstWhere(["id"=>1])){
            $role->value = "administrator";
            $role->save();
        }
        if($role = Role::firstWhere(["id"=>2])){
            $role->value = "employee";
            $role->save();
        }
        if($role = Role::firstWhere(["id"=>3])){
            $role->value = "hr";
            $role->save();
        }

        if(!Role::firstWhere(["value"=>"tech_support_director"])){
            Role::create([
                "id"=>4,
                "title"=>"Директор тех.саппорта",
                "value"=>"tech_support_director"
            ]);
        }
        if(!Role::firstWhere(["value"=>"tech_support_employee"])){
            Role::create([
                "id"=>5,
                "title"=>"Сотрудники тех.саппорта",
                "value"=>"tech_support_employee"
            ]);
        }
    }
}
