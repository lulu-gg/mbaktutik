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
            'password' => '$2y$10$qxxu6GvvKJyeyk4gibMIJevZF5zeFSXLabakn5LUwOb/Qvkks8VJK',
            'role_id' => 1,
        ]);
    }
}
