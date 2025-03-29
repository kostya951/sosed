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
            'name' => 'citizen',
            'label' => 'Житель'
        ]);
        Role::create([
            'name' => 'admin',
            'label' => 'Администратор'
        ]);
        Role::create([
            'name' => 'company',
            'label' => 'УК'
        ]);
    }
}
