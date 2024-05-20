<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Punggawa Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('admin'),
            'role_id' => 1,
        ]);
    }
}
