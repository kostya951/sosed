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
        Role::create([
            'id'=>1,
            'name' => 'citizen',
            'label' => 'Житель'
        ]);
        Role::create([
            'id'=>2,
            'name' => 'admin',
            'label' => 'Администратор'
        ]);
        Role::create([
            'id'=>3,
            'name' => 'company',
            'label' => 'УК'
        ]);
    }
}
