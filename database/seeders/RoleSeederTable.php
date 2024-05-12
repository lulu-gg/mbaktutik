<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'Admin',
            'Event Organizer',
            'Scan Officer',
            'Customer'
        ];

        foreach ($roles as $item) {
            Role::create(['name' => $item]);
        }
    }
}
